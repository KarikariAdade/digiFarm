<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessProfileUpdateRequest;
use App\Models\Business;
use App\Models\BusinessSize;
use App\Models\BusinessSocials;
use App\Models\BusinessType;
use App\Models\Country;
use App\Notifications\CompanyCompleteProfileNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        return view('business.profile.index');
    }


    public function edit()
    {
        $business = auth()->guard('business')->user();

        $business_types = BusinessType::query()->get();

        $business_sizes = BusinessSize::query()->get();

        $countries = DB::table('countries')->orderBy('name', 'asc')->get();

        return view('business.profile.edit', compact('business', 'business_sizes', 'business_types', 'countries'));
    }


    public function update(BusinessProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $data = $request->all();

        $data['business_code'] = $this->getAbbreviation($data['business_name']) . strtoupper(substr(md5(mt_rand()), 0, 7));

        $data['is_setup_complete'] = true;

        if ($user->is_approved != false){
            $data['business_code'] = $user->business_code;
        }

        if (!empty($request->file('business_logo'))){
            $data['business_logo'] = $this->performUpload($request->file('business_logo') , 'logo');
        }

        if (!empty($request->file('business_certificate'))){
            $data['business_certificate'] = $this->performUpload($request->file('business_certificate'), 'document');
        }

        DB::transaction(function () use ($data, $user, $request){

            $socials = BusinessSocials::query()->where('business_id', $user->id)->first();

            if ($socials){
                $socials->update($this->preparedSocials($data));
            }else{
                BusinessSocials::query()->create($this->preparedSocials($data));
            }

            if (!empty($request->file('business_certificate'))){
                $user->update(['business_document' => $data['business_certificate']]);
            }

            if (!empty($request->file('business_logo'))){
                $user->update(['business_logo' => $data['business_logo']]);
            }

            $user->update($this->preparedData($data));

            if ($user->is_approved != true){
                $this->sendNotification($user, $this->preparedData($data));
            }

        });

        if ($user->is_approved != true){
            toast('Profile Setup Completed. You\'ll receive an email when your account is approved!', 'success');
        }else{
            toast('Profile successfully updated', 'success');
        }


        return redirect()->route('business.dashboard');
    }

    public function preparedData($data)
    {
        return [
            'name' => $data['business_name'],
            'email' => $data['primary_email'],
            'business_code' => $data['business_code'],
            'secondary_email' => $data['secondary_email'],
            'primary_phone' => $data['primary_phone'],
            'secondary_phone' => $data['secondary_phone'],
            'country' => $data['country'],
            'city' => $data['city'],
            'region' => $data['region'],
            'address' => $data['office_address'],
            'business_size' => $data['business_size'],

            'type_id' => $data['business_type'],
            'tax_number' => $data['tax_number'],
            'description' => $data['description'],
            'is_setup_complete' => $data['is_setup_complete']
        ];
    }


    public function getAbbreviation($str, $as_space = array('-')): string
    {
        $str = str_replace($as_space, ' ', trim($str));

        $ret = '';

        foreach (explode(' ', $str) as $word) {

            $ret .= strtoupper($word[0]);

        }

        return $ret;
    }


    public function performUpload($file, $type)
    {

            # Add random string to filename
            $file_name = Str::random(4) . '' . $file->getClientOriginalName();

            # Set file path

            $path = "business_document/".auth()->user()->id."/";

            if ($type === 'logo') {
                $path = "business_logo/".auth()->user()->id."/";
            }

            # Get absolute path for file storage
            $abs_path = storage_path("app/public/$path");

            # Fetch user account
            $profile = Business::query()->where('id', auth()->user()->id)->first();

            # Delete old profile picture
            if (($type === 'logo') && $profile && File::exists($profile->business_logo)) {
                File::delete($profile->business_logo);
            }

            if (($type === 'document') && $profile && File::exists($profile->business_document)) {
                File::delete($profile->business_document);
            }

            # Move file to absolute path
            $file->move($abs_path, $file_name);

            return "storage/$path" . $file_name;
        }


    public function preparedSocials($data)
    {
        return [
            'business_id' => auth()->user()->id,
            'facebook' => $data['facebook_url'] ?? null,
            'instagram' => $data['instagram'] ?? null,
            'twitter' => $data['twitter_url'] ?? null,
            'linkedin' => $data['linkedin_url'] ?? null,
            'website' => $data['website_url'] ?? null,
        ];
    }

    public function sendNotification($account, $business): void
    {
        $account->notify(new CompanyCompleteProfileNotification($business));
    }
}

<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\FarmerSocials;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countries = Country::query()->orderBy('name', 'asc')->get();

        $socials = auth()->user()->getSocials;

        return view('farmer.profile.index', compact('countries', 'socials'));
    }


    public function edit()
    {
        $countries = Country::query()->orderBy('name', 'asc')->get();

        return view('farmer.profile.edit', compact('countries'));
    }


    public function update(Request $request)
    {
        $data = $request->all();

        $user = auth()->user();

        $validate = Validator::make($data, [
            'email' => 'required|email|'.Rule::unique('users','email')->ignore(auth()->guard()->user()->id),
            'avatar' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
            'full_name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:18|'.Rule::unique('users','phone')->ignore(auth()->guard()->user()->id),
            'country' => 'required',
            'region' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        if ($validate->fails()){
            return $this->getFailedResponse($validate->errors()->first());
        }

        if (!empty($request->file('avatar'))){
            $data['avatar'] = $this->performUpload($request->file('avatar'));
        }

        DB::transaction(function () use ($data, $request, $user) {

            $this->preparedSocials($data);

            $user->update($this->preparedData($data));

            if (!empty($request->file('avatar'))){
                $user->update(['avatar' => $data['avatar']]);
            }

        });

        toast('Profile updated successfully', 'success');

        return $this->getSuccessResponse('Profile updated successfully');


    }


    public function performUpload($file)
    {
        $file_name = Str::random(4) . '' . $file->getClientOriginalName();

        $path = "farmer/".auth()->user()->id."/";

        $abs_path = storage_path("app/public/$path");

        $profile = User::query()->where('id', auth()->user()->id)->first();

        if ($profile && File::exists($profile->avatar)) {
            File::delete($profile->avatar);
        }

        $file->move($abs_path, $file_name);

        return "storage/$path" . $file_name;
    }


    public function preparedData($data)
    {
        return [
            'name' => $data['full_name'],
            'address' => $data['address'],
            'country' => $data['country'],
            'description' => $data['description'],
            'city' => $data['city'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'region' => $data['region'],
            'code' => $this->getAbbreviation($data['full_name']).random_int(111111,999999)
        ];
    }

    public function preparedSocials($data)
    {
        $socials = FarmerSocials::query()->where('user_id', auth()->user()->id)->first();

        $dump = [
            'user_id' => auth()->user()->id,
            'facebook' => $data['facebook_url'] ?? null,
            'instagram' => $data['instagram'] ?? null,
            'twitter' => $data['twitter_url'] ?? null,
            'linkedin' => $data['linkedin_url'] ?? null,
            'website' => $data['website_url'] ?? null,
        ];

        if ($data['facebook_url'] || $data['instagram_url'] || $data['twitter_url'] || $data['linkedin_url'] || $data['website_url']){
            if ($socials){
                return $socials->update($dump);
            }

            return FarmerSocials::query()->create($dump);
        }


    }
}

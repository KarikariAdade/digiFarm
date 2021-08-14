<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Mail\BusinessAccountVerifyEmail;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('business.auth.register');
    }


    public function registerBusiness(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'company_name' => ['required', 'string', 'unique:businesses,name'],
            'company_email' => ['required', 'email', 'max:255', 'unique:businesses,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max: 20'],
            'region' => ['required'],
            'city' => ['nullable'],
            'country' => ['required'],
        ]);

        $data['token'] = sha1(time());

        $data['token_expire'] = Carbon::now()->addHour();

        if ($validate->fails()){
            return $this->getFailedResponse($validate->errors()->first());
        }

        $data['password'] = Hash::make($data['password']);

        $business = Business::query()->create($this->regData($data));

        Mail::to($business['email'])->send(new BusinessAccountVerifyEmail($business));

        return back()->with('success', 'Account created successfully');

    }


    public function regData($data)
    {
        return [
            'name' => $data['company_name'],
            'email' => $data['company_email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'region' => $data['region'],
            'city' => $data['city'],
            'country' => $data['country'],
            'token' => $data['token'],
            'token_expire' => $data['token_expire']
        ];
    }


}

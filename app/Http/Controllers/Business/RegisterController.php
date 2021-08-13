<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            return back()->withErrors($validate->errors()->first())->withInput();
        }

        $data['password'] = Hash::make($data['password']);

        $business = Business::query()->create($data);

        return back()->with('success', 'Account created successfully');



    }



}

<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Mail\BusinessAccountVerifyEmail;
use App\Models\Business;
use App\Models\Country;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:business')->except('logout');
    }

    public function index()
    {
        $countries = DB::table('countries')->orderBy('name', 'asc')-> get();

        return view('business.auth.login', compact('countries'));
    }


    public function login(LoginRequest $request)
    {
        $data = $request->only('email', 'password');

        $business = Business::query()->where('email', $request->get('email'))->first();

        # Set token and token expiry date
        $resendData = [
            'token' => sha1(time()),
            'token_expire' => Carbon::now()->addHour(),
        ];

        if (Auth::guard('business')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            if (!empty($business)){

                if ($business->email_verified !== 1 || $business->email_verified_at === null){

                    # Log user out and give option to restart email verification
                    auth()->guard('business')->logout();

                    return redirect()->route('business.auth.token.expire', ['token' => $resendData['token'], 'name' => sha1($business->name)]);

                }
            }

                return redirect()->route('business.dashboard');
            }

        return back()->with('error', 'Invalid Email Address or Password');
    }


    public function verifyBusiness($token, $name)
    {
        if (!empty($token) && !empty($name)){

            $business = Business::query()->where('token', $token)->first();

            if (!empty($business)){

                if ($business->email_verify === 1 && $business->email_verified_at !== null){

                    # If verified, redirect to login page
                    return redirect()->route('business.auth.login');

                }

                if ($business->token_expire < now()){

                    return redirect()->route('business.auth.token.expire', compact('token', 'name'));

                }

                # Else, update user and redirect to login
                $business->update([
                    'email_verified' => 1,
                    'email_verified_at' => now(),
                    'token' => null,
                    'token_expire' => null,
                ]);

                return redirect()->route('business.auth.login')->with('success', 'Account successfully verified');

            }
            return redirect()->route('business.auth.login');

        }


    }


    public function expiredToken($token, $name)
    {
        return view('business.auth.expired_token', compact('token', 'name'));
    }


    public function resendToken(Request $request)
    {
        $request->validate([
            'email' => 'email|required'
        ]);

        $business = Business::query()->where('email', $request->get('email'))->first();

        if (!empty($business)){

            $business->update([
                'token' => sha1(time()),
                'token_expire' => Carbon::now()->addHour()
            ]);

            Mail::to($business->email)->send(new BusinessAccountVerifyEmail($business));

            return back()->with('success', 'Email Sent, confirm and login again');
        }

        return back()->with('error', 'The entered Email Address does not exist in our system. Please click the sign up button to sign up');
    }

    public function logout()
    {
        auth()->guard('business')->logout();

        return redirect()->route('business.auth.login');
    }
}

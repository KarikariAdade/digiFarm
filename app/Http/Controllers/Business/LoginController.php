<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('business.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        $this->loginValidate($data);

        if (Auth::guard('business')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return 'User logged in';
        }

        return 'User not logged in';
    }


    public function logout()
    {
        auth()->guard('business')->logout();

        return redirect()->route('business.auth.login');
    }
}

<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Country;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        if (Auth::guard('business')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return redirect()->route('business.dashboard');
        }

        return back()->with('error');
    }


    public function logout()
    {
        auth()->guard('business')->logout();

        return redirect()->route('business.auth.login');
    }
}

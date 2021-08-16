<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('business.profile.index');
    }


    public function edit()
    {
        return view('business.profile.edit');
    }


    public function update(Request $request)
    {
        return $request->all();
    }
}

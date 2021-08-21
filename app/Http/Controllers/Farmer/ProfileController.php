<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('farmer.profile.index');
    }


    public function edit()
    {
        $countries = Country::query()->orderBy('name', 'asc')->get();

        return view('farmer.profile.edit', compact('countries'));
    }


    public function update(Request $request)
    {
        return $request->all();
    }
}

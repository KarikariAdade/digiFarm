<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\BusinessSize;
use App\Models\BusinessType;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        return view('business.profile.index');
    }


    public function edit()
    {
        $business_types = BusinessType::query()->get();

        $business_sizes = BusinessSize::query()->get();

        $countries = DB::table('countries')->orderBy('name', 'asc')-> get();

        return view('business.profile.edit', compact('business_sizes', 'business_types', 'countries'));
    }


    public function update(Request $request)
    {

        return $request->all();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainWebsiteController extends Controller
{
    public function about()
    {
        return view('website.about.index');
    }

    public function farmers()
    {
        return view('website.farmers.index');
    }

    public function market()
    {
        return view('website.market.index');
    }

    public function forum()
    {
        return view('website.forum.index');
    }
}

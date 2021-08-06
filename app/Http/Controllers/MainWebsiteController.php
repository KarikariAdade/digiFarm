<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainWebsiteController extends Controller
{
    public function about()
    {
        return view('website.about.index');
    }
}

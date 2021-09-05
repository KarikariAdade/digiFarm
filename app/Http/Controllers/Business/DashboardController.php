<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:business');
    }

    public function dashboard()
    {
        $user = auth('business')->user();

        return view('business.dashboard', compact('user'));
    }

    public function notApproved()
    {
        return view('business.not_approved');
    }
}

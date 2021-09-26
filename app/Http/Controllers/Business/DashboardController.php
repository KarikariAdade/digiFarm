<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\RequestProposal;
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

        $proposals = RequestProposal::query()->where('business_id', $user->id)->orderBy('id', 'desc')->limit(5)->get();

        return view('business.dashboard', compact('user', 'proposals'));
    }

    public function notApproved()
    {
        return view('business.not_approved');
    }
}

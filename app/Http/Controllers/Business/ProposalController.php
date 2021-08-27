<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        return view('business.proposals.index');
    }

    public function show()
    {
        return view('business.proposals.details');
    }


    public function approve()
    {
        return 'approve';
    }


    public function decline()
    {
        return 'reject';
    }
}

<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessMarketRequest;
use Illuminate\Http\Request;

class MarketRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:business');
    }

    public function index()
    {
        return view('business.request.index');
    }

    public function create()
    {
        return view('business.request.create');
    }

    public function store(BusinessMarketRequest $request)
    {
        return $request->all();
    }


    public function show()
    {
        return view('business.request.details');
    }


    public function edit()
    {
        return view('business.request.edit');
    }



    public function update(BusinessMarketRequest $request, $id)
    {
        return $request->all();
    }


}

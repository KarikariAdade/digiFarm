<?php

namespace App\Http\Controllers\Business;

use App\DataTables\Business\BusinessMarketRequestDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessMarketRequest;
use App\Models\MarketRequests;
use Illuminate\Http\Request;

class MarketRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:business');
    }

    public function index(BusinessMarketRequestDatatable $datatable)
    {
        return $datatable->render('business.request.index');
    }

    public function create()
    {
        return view('business.request.create');
    }

    public function store(BusinessMarketRequest $request)
    {
        $data = $request->all();

        $data['business_id'] = auth('business')->user()->id;

        MarketRequests::query()->create($data);

        toast('Request successfully created', 'success');

        if ($data['save'] === 'save'){
            return back();
        }

        return redirect()->route('business.dashboard.request.index');

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

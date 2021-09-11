<?php

namespace App\Http\Controllers\Business;

use App\DataTables\Business\BusinessMarketRequestDatatable;
use App\DataTables\Business\ListRequestProposalsDatatable;
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


    public function cardView()
    {
        $requests = MarketRequests::query()->where('business_id', auth('business')->user()->id)
            ->orderBy('is_approved', 'asc')->paginate(10);

        return view('business.request.card', compact('requests'));
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

//    public function groupDetail(MarketRequests $request, ListRequestProposalsDatatable $datatable)
//    {
//        return $datatable->with('id', $request->id)->render('business.proposals.group_detail', compact('request'));
//    }
    public function show(MarketRequests $request, ListRequestProposalsDatatable $datatable)
    {
        return $datatable->with('id', $request->id)->render('business.request.details', compact('request'));
    }


    public function edit(MarketRequests $request)
    {
        return view('business.request.edit', compact('request'));
    }



    public function update(BusinessMarketRequest $request, MarketRequests $id)
    {
        $data = $request->all();

        $data['business_id'] = auth('business')->user()->id;

        if ($data['status'] === 'approve'){
            $data['is_approved'] = true;
        }else{
            $data['is_approved'] = false;
        }

        $id->update($data);

        toast('Request successfully updated', 'success');

        if ($data['save'] === 'save'){
            return back();
        }

        return redirect()->route('business.dashboard.request.index');
    }


    public function approveRequest(MarketRequests $request)
    {
        $request->update(['is_approved' => true]);

        toast('Request Approved Successfully', 'success');

        return back();
    }


    public function deleteRequest(MarketRequests $request)
    {
        $request->delete();

        toast('Request Deleted Successfully', 'success');

        return redirect()->route('business.dashboard.request.index');
    }


}

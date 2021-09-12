<?php

namespace App\Http\Controllers\Farmer;

use App\DataTables\Farmer\ProposalsDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProposalRequest;
use App\Models\Business;
use App\Models\MarketRequests;
use App\Models\RequestProposal;
use App\Notifications\FarmerProposalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ProposalsDatatable $datatable)
    {
        return $datatable->render('farmer.proposals.index');
    }


    public function show()
    {
        return view('farmer.proposals.details');
    }



    public function submitProposal(ProposalRequest $request, MarketRequests $market_request)
    {
       $data = $request->all();

       $data['business_id'] = $market_request->business_id;

       $data['request_id'] = $market_request->id;

       $business = Business::query()->where('id', $data['business_id'])->first();

       DB::transaction(function () use ($data) {
           RequestProposal::query()->create($this->prepareProposal($data));
       });

       $this->sendNotification($business, $this->prepareProposal($data));

       toast('Proposal sent successfully', 'success');

       return back();

    }


    public function prepareProposal($data)
    {
        return [
            'user_id' => auth()->user()->id,
            'business_id' => $data['business_id'],
            'request_id' => $data['request_id'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'measurement_unit' => $data['measurement_unit'],
            'quantity' => $data['quantity'],
            'price_quote' => $data['price_quote']
        ];
    }


    public function sendNotification($business, $data)
    {
        $business->notify(new FarmerProposalNotification($this->prepareProposal($data)));
    }
}

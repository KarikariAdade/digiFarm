<?php

namespace App\Http\Controllers\Business;

use App\DataTables\Business\ListRequestProposalsDatatable;
use App\DataTables\Business\ProposalFarmerFarmsDataTable;
use App\DataTables\Business\ProposalsGroupDataTable;
use App\DataTables\Business\ProposalsListDataTable;
use App\Http\Controllers\Controller;
use App\Jobs\ProposalAcceptJob;
use App\Models\Clients;
use App\Models\Farm;
use App\Models\MarketRequests;
use App\Models\RequestProposal;
use App\Models\User;
use App\Notifications\ProposalAcceptNotification;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:business');
    }


    public function index(ProposalsListDataTable $dataTable)
    {
        return $dataTable->render('business.proposals.index');
    }

    public function show(RequestProposal $proposal, ProposalFarmerFarmsDataTable $dataTable)
    {
        return $dataTable->with('id', $proposal->getUser->id)->render('business.proposals.details', compact('proposal'));
    }


    public function approve(RequestProposal $proposal)
    {
        $data = [
            'name' => $proposal->getUser->name,
            'company_name' => $proposal->getBusiness->name,
            'company_email' => $proposal->getBusiness->email,
            'company_phone' => $proposal->getBusiness->primary_phone,
            'phone' => $proposal->getUser->phone
        ];

        $user = $proposal->getUser->id;

        Clients::query()->create([
            'user_id' => $user,
            'business_id' => $proposal->getBusiness->id
        ]);

        $user = User::query()->where('id', $user)->first();

        ProposalAcceptJob::dispatch($data);

        if ($user){
            $user->notify(new ProposalAcceptNotification($data));
        }

        $proposal->update(['status' => 'approved']);

        toast('Proposal by '.$proposal->getUser->name.' accepted successfully', 'success');

        return back();
    }


    public function decline(RequestProposal $proposal)
    {
        $proposal->update(['status' => 'declined']);

        toast('Proposal by '.$proposal->getUser->name.' declined successfully', 'status');

        return back();
    }


    public function viewFarm(Farm $farm)
    {
        return view('business.proposals.farm', compact('farm'));
    }


    public function group(ProposalsGroupDataTable $dataTable)
    {
        return $dataTable->render('business.proposals.group');
    }


    public function groupDetail(MarketRequests $request, ListRequestProposalsDatatable $datatable)
    {
        return $datatable->with('id', $request->id)->render('business.proposals.group_detail', compact('request'));
    }
}

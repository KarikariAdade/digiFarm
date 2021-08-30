<?php

namespace App\Http\Controllers\Business;

use App\DataTables\Business\ProposalsListDataTable;
use App\Http\Controllers\Controller;
use App\Models\RequestProposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index(ProposalsListDataTable $dataTable)
    {
        return $dataTable->render('business.proposals.index');
    }

    public function show(RequestProposal $proposal)
    {
        return view('business.proposals.details', compact('proposal'));
    }


    public function approve(RequestProposal $proposal)
    {
        return $proposal;
    }


    public function decline(RequestProposal $proposal)
    {
        $proposal->update(['status' => 'declined']);

        toast('Proposal by '.$proposal->getUser->name.' declined successfully', 'status');

        return back();
    }
}

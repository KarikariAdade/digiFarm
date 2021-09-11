<?php

namespace App\Http\Controllers\Business;

use App\DataTables\Business\ClientsDatatable;
use App\DataTables\Business\ProposalFarmerFarmsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:business');
    }

    public function index(ClientsDatatable $datatable)
    {
        return $datatable->render('business.clients.index');
    }

    public function details(Clients $client, ProposalFarmerFarmsDataTable $dataTable)
    {
        return $dataTable->with('id', $client->id)->render('business.clients.details', compact('client'));
    }
}

<?php

namespace App\Http\Controllers\Farmer;

use App\DataTables\Farmer\BusinessRequestsDataTable;
use App\DataTables\Farmer\ClientDatatable;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Clients;
use App\Models\MarketRequests;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ClientDatatable $datatable)
    {
        return $datatable->render('farmer.clients.index');
    }

    public function details(Clients $client, BusinessRequestsDataTable $dataTable)
    {
        return $dataTable->with('id', $client->business_id)->render('farmer.clients.details', compact('client'));
    }

    public function clientRequestDetails(MarketRequests $request)
    {
        return view('farmer.clients.request_detail', compact('request'));
    }
}

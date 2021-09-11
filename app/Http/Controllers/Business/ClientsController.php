<?php

namespace App\Http\Controllers\Business;

use App\DataTables\Business\ClientsDatatable;
use App\DataTables\Business\ProposalFarmerFarmsDataTable;
use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


    public function addReview(Clients $client, Request $request)
    {
        $data = $request->all();

        $rules = [
            'rating' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];

        $validate = Validator::make($data, $rules);

        if ($validate->fails()){
            return back()->with('error', $validate->errors()->first());
        }

        $data['user_id'] = $client->getUser->id;

        ClientReview::query()->create($this->prepareRatingData($data));

        toast($client->getUser->name.' rated successfully', 'success');

        return back();

    }

    public function prepareRatingData($data)
    {
        return [
            'user_id' => $data['user_id'],
            'business_id' => auth('business')->user()->id,
            'rating' => $data['rating'],
            'title' => $data['title'],
            'message' => $data['description']
        ];
    }
}

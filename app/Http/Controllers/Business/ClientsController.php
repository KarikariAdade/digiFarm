<?php

namespace App\Http\Controllers\Business;

use App\DataTables\Business\ClientsDatatable;
use App\DataTables\Business\ProposalFarmerFarmsDataTable;
use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use App\Models\Clients;
use App\Models\RequestProposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $statistics = RequestProposal::query()->select(
            DB::raw('sum(price_quote) as sums'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
            )->groupBy('months', 'monthKey')
            ->orderBy('created_at', 'ASC')
            ->get();

//        return $statistics;

//        foreach ($statistics as $statistic) {
//            return $statistic['sums'].' '.$statistic['monthKey'];
//        }
//
//        return $statistics;

        return $dataTable->with('id', $client->id)->render('business.clients.details', compact('client', 'statistics'));
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

        $check_review = ClientReview::query()->where('user_id', $data['user_id'])
            ->where('business_id', auth('business')->user()->id)->first();

        if ($check_review){
            $check_review->update($this->prepareRatingData($data));
        }else{
            ClientReview::query()->create($this->prepareRatingData($data));
        }

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

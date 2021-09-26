<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use App\Models\RequestProposal;
use Illuminate\Http\Request;
use App\Models\Farm;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // public function __construct()
     // {
     //     $this->middleware('auth');
     // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approved_proposals = RequestProposal::query()->where('user_id', auth()->user()->id)
            ->where('status', '=', 'approved')->orderBy('id', 'desc')->limit(5)->get();

        $recent_reviews = ClientReview::query()->where('user_id', auth('web')->user()->id)->orderBy('id', 'desc')->limit(5)->get();

        return view('farmer.dashboard', compact('approved_proposals', 'recent_reviews'));
    }


    public function getFarms(){
        return response()->json(Farm::query()->get());
    }
}

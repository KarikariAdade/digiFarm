<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessType;
use App\Models\MarketRequests;
use Illuminate\Http\Request;

class MainWebsiteController extends Controller
{
    public function about()
    {
        return view('website.about.index');
    }

    public function farmers()
    {
        return view('website.farmers.index');
    }

    public function market()
    {
        $business_type = BusinessType::query()->take(8)->get();

        $popular_requests = MarketRequests::query()->where('is_approved', false)->take(3)->get();

        $market_request = MarketRequests::query()->where('is_approved', false)->orderBy('id', 'desc')->get();
//
////        return $business_type;
//
//        foreach ($business_type->getBusiness as $getBusiness) {
//            return $getBusiness->getBusiness;
//        }
        return view('website.market.index', compact('business_type', 'popular_requests', 'market_request'));
    }


    public function marketDetail(MarketRequests $request)
    {
        return view('website.market.details', compact('request'));
    }

    public function forum()
    {
        return view('website.forum.index');
    }
}

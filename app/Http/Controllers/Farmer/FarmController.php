<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmRequest;
use App\Models\Farm;
use App\Models\FarmCategory;
use App\Models\FarmSubCategory;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('farmer.farm.index');
    }


    public function create()
    {
        $farm_categories = FarmCategory::query()->get();

        return view('farmer.farm.create', compact('farm_categories'));
    }


    public function store(FarmRequest $request)
    {
        $data = $request->all();

        return $data;
    }


    public function show(Farm $id)
    {
        return $id;
    }


    public function edit(Farm $id)
    {
        return $id;
    }


    public function update(FarmRequest $request)
    {
        $data = $request->all();

        return $data;
    }


    public function delete(FarmRequest $id)
    {
        return $id;
    }
}

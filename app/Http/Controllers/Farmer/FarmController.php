<?php

namespace App\Http\Controllers\Farmer;

use App\DataTables\Farmer\FarmDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FarmRequest;
use App\Models\Farm;
use App\Models\FarmCategory;
use App\Models\FarmImage;
use App\Models\FarmSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FarmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(FarmDatatable $datatable)
    {
        return $datatable->render('farmer.farm.index');
    }


    public function create()
    {
        $farm_categories = FarmCategory::query()->get();

        return view('farmer.farm.create', compact('farm_categories'));
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'farm_name' => 'required|min:5',
            'farm_category' => 'required',
            'farm_type' => 'required',
            'land_size' => 'nullable',
            'crop_number' => 'nullable',
            'animal_number' => 'nullable',
            'average_production' => 'required',
            'description' => 'nullable',
            'farm_address' => 'required',
            'farm_images.*' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
        ]);

        if ($validate->fails()){
            return $this->getFailedResponse($validate->errors()->first());
        }

        if (empty($data['land_size']) && ($data['farm_category'] == 2 || $data['farm_category'] == 4 || $data['farm_category'] == 5|| $data['farm_category'] == 6)){
            return $this->getFailedResponse('Land Size is required when farm type is crop');
        }

        if (empty($data['animal_number']) && ($data['farm_category'] == 1 || $data['farm_category'] == 3 || $data['farm_category'] == 7)){
            return $this->getFailedResponse('Animal Number is required when farm type is animal');
        }

        DB::transaction(function () use ($request, $data) {
            $farm = Farm::query()->create($this->prepareData($data))->id;

            foreach($request->file('farm_images') as $file){
                FarmImage::query()->create([
                    'farm_id' => $farm,
                    'path' => $this->performFileUpload($file, $farm)
                ]);
            }

        });

        toast('Farm Added Successfully', 'success');

        return $this->getSuccessResponse('Farm Added successfully');
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


    public function performFileUpload($file, $farm)
    {
        $file_name = Str::random(4) . '' . $file->getClientOriginalName();

        $path = "farm/".$farm."/";

        $abs_path = storage_path("app/public/$path");

        $file->move($abs_path, $file_name);

        return "storage/$path" . $file_name;
    }


    public function prepareData($data)
    {
        return [
            'name' => $data['farm_name'],
            'user_id' => auth()->user()->id,
            'farm_category_id' => $data['farm_category'],
            'farm_sub_category_id' => $data['farm_type'],
            'land_size' => $data['land_size'],
            'crop_number' => $data['crop_number'],
            'animal_number' => $data['animal_number'],
            'average_production' => $data['average_production'],
            'address' => $data['farm_address'],
            'description' => $data['description']
        ];
    }

}

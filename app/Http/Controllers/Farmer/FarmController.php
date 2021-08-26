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
use Illuminate\Support\Facades\File;
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

        $validate = Validator::make($data, $this->validationRules());

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


    public function show(Farm $farm)
    {
        return view('farmer.farm.show', compact('farm'));
    }


    public function edit(Farm $farm)
    {
        $farm_categories = FarmCategory::query()->get();

        return view('farmer.farm.edit', compact('farm', 'farm_categories'));
    }


    public function update(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->validationRules());

        if ($validator->fails()){
            return $this->getSuccessResponse($validator->errors()->first());
        }

        if (empty($data['land_size']) && ($data['farm_category'] == 2 || $data['farm_category'] == 4 || $data['farm_category'] == 5|| $data['farm_category'] == 6)){
            return $this->getFailedResponse('Land Size is required when farm type is crop');
        }

        if (empty($data['animal_number']) && ($data['farm_category'] == 1 || $data['farm_category'] == 3 || $data['farm_category'] == 7)){
            return $this->getFailedResponse('Animal Number is required when farm type is animal');
        }

        DB::transaction(function () use ($request, $data, $farm) {
            $farm->update($this->prepareData($data));

            foreach($request->file('farm_images') as $file){
                FarmImage::query()->create([
                    'farm_id' => $farm->id,
                    'path' => $this->performFileUpload($file, $farm->id)
                ]);
            }

        });

        toast('Farm Updated Successfully', 'success');

        return $this->getSuccessResponse('Farm Updated successfully');
    }


    public function validationRules()
    {
        return [
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
        ];
    }


    public function deleteImage(Request $request)
    {
        $image = $request->get('image');

        $image = FarmImage::query()->where('id', $image)->first();

        if ($image && File::exists($image->path)){

            File::delete($image->path);

            $image->delete();
        }

        return $this->getSuccessResponse('Image deleted successfully');
    }


    public function delete(Farm $farm)
    {
        $farm_images = FarmImage::query()->where('farm_id', $farm->id)->get();

        foreach ($farm_images as $farm_image){
            if (File::exists($farm_image->path)){
                File::delete($farm_image->path);
            }
        }

        $farm->delete();

        toast('Farm deleted successfully', 'success');

        return redirect()->route('farmer.dashboard.farm.index');
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

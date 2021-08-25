<?php

namespace App\Http\Controllers;

use App\Models\FarmCategory;
use App\Models\FarmSubCategory;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestsController extends Controller
{

    public function getRegion(Request $request)
    {
        $country = $request->get('country');

        $regions = DB::table('regions')->where('country_id', $country)->get();

        $output = '';

        foreach ($regions as $region){
            $output .= '<option value="'.$region->id.'">'.$region->name.'</option>';
        }

        return $this->getSuccessResponse($output);
    }


    public function getFarmSubCategory(Request $request)
    {
        $farm_category = $request->get('farm_category');

        $farm_category = FarmCategory::query()->where('id', $farm_category)->first();

        $farm_type = 'is_animal';

        if ($farm_category->is_crop == true){
            $farm_type = 'is_crop';
        }

        $farm_sub_categories = FarmSubCategory::query()->where('farm_category_id', $farm_category->id)->get();

        $output = '';

        foreach ($farm_sub_categories as $sub_category){
            $output .= '<option value="'.$sub_category->id.'">'.$sub_category->name.'</option>';
        }

        return response()->json([
            'code' => 200,
            'farm_type' => $farm_type,
            'data' => $output
        ]);
    }
}

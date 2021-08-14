<?php

namespace App\Http\Controllers;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\FarmImage;
use App\Models\Region;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loginValidate(array $data)
    {
        $rules = [
            'email' => ['required', 'string'],
            'password' => ['required'],
        ];

        return Validator::make($data, $rules);
    }


    public function getSuccessResponse($msg)
    {
        return response()->json([
            'code' => 200,
            'msg' => $msg
        ]);
    }


    public function getFailedResponse($msg)
    {
        return response()->json([
            'code' => 401,
            'msg' => $msg
        ]);
    }


    public function getAbbreviation($str, $as_space = array('-')): string
    {
        $str = str_replace($as_space, ' ', trim($str));

        $ret = '';

        foreach (explode(' ', $str) as $word) {

            $ret .= strtoupper($word[0]);

        }

        return $ret;
    }


}

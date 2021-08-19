<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessMarketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'due_date' => 'required',
            'request_type' => 'required',
            'product_type' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
            'description' => 'nullable'
        ];
    }
}

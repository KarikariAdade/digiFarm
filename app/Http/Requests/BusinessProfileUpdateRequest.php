<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BusinessProfileUpdateRequest extends FormRequest
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
            'business_name' => 'required|string|'.Rule::unique('businesses','name')->ignore(auth()->guard('business')->user()->id),
            'primary_email' => 'required|email|'.Rule::unique('businesses','email')->ignore(auth()->guard('business')->user()->id),
            'secondary_email' => 'nullable|email|'.Rule::unique('businesses','secondary_email')->ignore(auth()->guard('business')->user()->id),
            'primary_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:18|'.Rule::unique('businesses','primary_phone')->ignore(auth()->guard('business')->user()->id),
            'secondary_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:18|'.Rule::unique('businesses','secondary_phone')->ignore(auth()->guard('business')->user()->id),
            'country' => 'required',
            'city' => 'required',
            'region' => 'required',
            'office_address' => 'required',
            'description' => 'nullable',
            'business_type' => 'required',
            'business_size' => 'required',
            'tax_number' => 'required',
            'business_logo' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
            'business_certificate' => 'nullable|mimes:pdf|max:5000',
        ];
    }
}

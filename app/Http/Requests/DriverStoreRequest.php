<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverStoreRequest extends FormRequest
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
            'name'            => 'required|max:20',
            'email'           => 'required|unique:drivers,email',
            'mobile'          => "required|min:11|max:14|unique:drivers,mobile",
            'password'        => 'required|min:8|max:20',
            'cnic_no'         => 'required|min:13|max:15|unique:drivers',
            'image'           => 'required|mimes:pdf,jpg,jpeg,png|max:5000',
            'address'         => 'required|min:30|max:250',
            'vehicle_name'    => 'required|max:15',
            'vehicle_type_id' => 'required',
            'vehicle_cc'      => 'required|max:10',
            'vehicle_no'      => 'required|min:7|unique:vehicles',
            'license_no'      => 'required|max:19|unique:vehicles',
            'make'            => 'required|max:15',
            'model'           => 'required|max:15',
            'color'           => 'required',
            'year'            => 'required|digits:4|integer|min:1990|max:' . (date('Y')),
            'vehicle_image1'   => 'required|mimes:pdf,jpg,jpeg,png|max:5000',
        ];
    }
}

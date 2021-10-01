<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleTypeStore extends FormRequest
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
            'title'                => 'required|unique:vehicle_types',
            'passenger_capacity'   => 'required',
            'sort_order'            => 'required',
            'image'                => 'required|mimes:pdf,jpg,jpeg,png|max:5000',
        ];
    }
}

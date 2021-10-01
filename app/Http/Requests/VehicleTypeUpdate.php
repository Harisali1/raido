<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleTypeUpdate extends FormRequest
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
            'title'                => "required|unique:vehicle_types,id,{$this->vehicle_type->id}",
            'vehicle_category_id'  => 'required',
            'passenger_capacity'   => 'required',
            'base_fare'            => 'required',
            'base_waiting_time'    => 'required',
            'waiting_time_penalty' => 'required',
//            'image'                => 'required|mimes:pdf,jpg,jpeg,png|max:5000',
            'description'          => 'required',
        ];
    }
}

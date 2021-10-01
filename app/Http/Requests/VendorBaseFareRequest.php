<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorBaseFareRequest extends FormRequest
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
            'vehicle_type_id' => 'required',
            'base_fare'       => 'required',
            'per_km'          => 'required',
            'per_hours'       => 'required',
        ];
    }
}

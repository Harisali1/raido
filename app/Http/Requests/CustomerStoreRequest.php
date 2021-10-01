<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'name'     => 'required|max:15',
            'email'    => 'email|required|unique:users',
            'mobile'   => 'required|min:11|max:14|unique:users',
            'password' => 'required|min:8',
            'cnic'     => 'required|min:13|max:15|unique:users',
            'gender'   => 'required',
            'address'  => 'required|min:30|max:250'
//            'dob'      => 'required|date|date_format:Y-m-d|after:01-01-1950|before:31-12-2002',
//            'image'    => 'required|mimes:pdf,jpg,jpeg,png|max:5000',
        ];
    }
}

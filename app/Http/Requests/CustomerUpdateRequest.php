<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => "email|required|unique:users,id,{$this->customer->id}",
            'mobile'   => "required|min:11|max:14|unique:users,id,{$this->customer->id}",
            'password' => 'required|min:8',
            'cnic'     => "required|min:13|max:15|unique:users,id,{$this->customer->id}",
            'dob'      => 'required|date|date_format:Y-m-d|after:01-01-1950|before:31-12-1999',
            'image'    => 'required|mimes:pdf,jpg,jpeg,png|max:5000',
            'address'  => 'required'
        ];
    }
}

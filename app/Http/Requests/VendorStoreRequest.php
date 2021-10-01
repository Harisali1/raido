<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorStoreRequest extends FormRequest
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
            'name'     => 'required|unique:vendors,name',
            'email'    => 'required|unique:vendors,email',
            'mobile'   => "required|min:11|max:14|unique:vendors,mobile",
            'password' => 'required|min:8',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use App\Rules\MatchOldPasswordVendor;
use Illuminate\Foundation\Http\FormRequest;

class VendorChangePassword extends FormRequest
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
            'current_password' => ['required', new MatchOldPasswordVendor($this->vendor->id)],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPasswordAdmin;
use Illuminate\Foundation\Http\FormRequest;

class AdminChangePassword extends FormRequest
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
            'current_password' => ['required', new MatchOldPasswordAdmin($this->sub_admin->id)],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ];
    }
}

<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchReferralCode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $referralCode;

    public function __construct($referralCode)
    {
        $this->referralCode = $referralCode;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        dd($attribute);

        $user = User::findOrFail($this->id);
        return Hash::check($value, $user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is Not matched with the old password.';
    }
}

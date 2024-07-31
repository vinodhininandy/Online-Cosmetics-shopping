<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Example regex pattern for a simple 10-digit phone number
        return preg_match('/^\d{10}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid phone number.';
    }
}
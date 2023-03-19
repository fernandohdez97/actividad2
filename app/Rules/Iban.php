<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Iban implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $pattern = '/^[A-Za-z][A-Za-z]\\d\\d\\s\\d\\d\\d\\d\\s\\d\\d\\d\\d\\s\\d\\d\\s\\d\\d\\d\\d\\d\\d\\d\\d\\d\\d$/i';
        return preg_match($pattern, $value); 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El :attribute debe corresponder al formato de IBAN español (Ej. ES01 2100 0418 45 0200051331)";
    }
}

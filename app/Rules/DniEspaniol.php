<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DniEspaniol implements Rule
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
        $pattern = '/^\\d\\d\\d\\d\\d\\d\\d\\d[A-Z]$/i';
        return preg_match($pattern, $value); 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El :attribute encontrarse en formato español de 8 numeros seguidos de una letra.";
    }
}

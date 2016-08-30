<?php namespace App\Services\Validation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

class CustomValidation extends Validator
{
    /**
     * Check if the current password matches the given password
     * 
     * Use it like so
     * 'password' => 'current_password'
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */ 
    public function validateCurrentPassword($attribute, $value, $parameters)
    {
        return Auth::attempt(['email' => Auth::user()->email, 'password' => $value]);
    }

    /**
     * Check if the first time value is smaller then the second time value.
     * Where times are in format 10:00 and 12:00
     *
     * Use it like so
     * 'end_time' => 'greater_then:start_time'
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool|int
     */
    public function validateGreaterThen($attribute, $value, $parameters)
    {
        $first = explode(':', $value);
        $second = explode(':', Input::get($parameters[0]));

        if (intval($first[0]) == intval($second[0])) {
            return intval($first[1] > intval($second[1]));
        }

        return intval($first[0]) > intval($second[0]);
    }
}
<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CheckCurrentPassword implements Rule
{
    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
        $user = Auth::guard("user")->user() ;
        return Hash::check($value , $user->password) ;
    }

    public function message()
    {
        return trans('validation.');
    }
}

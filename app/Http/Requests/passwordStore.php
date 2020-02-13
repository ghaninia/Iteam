<?php

namespace App\Http\Requests;
use App\Rules\equalCurrentPassRule;
use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class passwordStore extends FormRequest
{

    public function authorize()
    {
        return true ;
    }

    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }
}

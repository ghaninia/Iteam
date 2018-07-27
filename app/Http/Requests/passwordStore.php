<?php

namespace App\Http\Requests;

use App\Rules\CheckCurrentPassword;
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
            'current_password' => [ 'required' , new CheckCurrentPassword() ]
        ];
    }
}

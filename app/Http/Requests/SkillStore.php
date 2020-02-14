<?php

namespace App\Http\Requests;

use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkillStore extends FormRequest
{
    public function authorize()
    {
        return true ;
    }

    public function rules()
    {
        $user = me() ;
        $max_skill_in_plan = $user->plan->count_skill ;
        return [
            "skill" => ["nullable" , "array" , "max:".$max_skill_in_plan ] ,
            "skill.*" => ["required" , Rule::in(Skill::pluck("id")->toArray())  ]
        ];
    }
}

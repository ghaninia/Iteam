<?php

namespace App\Http\Requests;

use App\Models\City;
use App\Models\Province;
use App\Models\Skill;
use App\Models\Tag;
use App\Rules\MobileRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamStore extends FormRequest
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
            'name' => ['required' , 'max:255' , 'min:4' ] ,
            'excerpt' => ['required'] ,
            'content' => ['required'] ,
            'mobile'  =>  ['required' , new MobileRule() ] ,
            'email'   => ['nullable' , 'email'] ,
            'website' => ['nullable' , 'url'] ,
            'province_id' => ['required' , Rule::in(Province::pluck('id')->toArray()) ] ,
            'city_id' => ['required' , Rule::in( City::pluck('id')->toArray() )] ,
            'address' => ['nullable'] ,


            'type_assist' => ['required' , 'array'] ,
            'type_assist.*' => [ 'required' , Rule::in( typeAssists() ) ] ,

            'required_gender' => [ 'required' , 'array' , 'min:1' ] ,
            'required_gender.*' => [ 'required' , Rule::in(genders()) ] ,


            'count_member' => ['required' , 'numeric'] ,
            'interplay_fiscal' => ['required' , Rule::in(interplayFiscals())] ,

            'min_salary' => [ 'required_if:interplay_fiscal,==,fixedsalary' , 'numeric' ] ,
            'max_salary' => [ 'required_if:interplay_fiscal,==,fixedsalary' , 'numeric' ] ,

            'skills' => ['required' , 'array' , 'min:1'] ,
            'skills.*' => ['required' , Rule::in( Skill::pluck('id')->toArray() ) ] ,

            'tag' => ['required' , Rule::in(Tag::pluck('id')->toArray()) ] ,
            'child_tag' => ['required' , Rule::in(Tag::pluck('id')->toArray()) ] ,

        ];
    }
}

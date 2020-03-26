<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Province ;
use App\Models\City ;
use App\Models\Tag ;

class TeamStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $Provinces = Province::pluck("id")->toArray() ;
        $Cities = City::pluck("id")->toArray() ;
        $tags = Tag::pluck("id")->toArray() ;

        return [
            "name" => ["required" , "min:5" , "max:255"] ,
            "excerpt" => ["required" , "min:5" , sprintf("max:%s" , config("timo.max_team_desc") ) ] ,
            "provinces" => [ "required" , Rule::in($Provinces) ],
            "cities" => [ "required" , Rule::in($Cities) ] ,
            "address" => ["required" , "min:3"] ,

            "contact_type" => ["required" , "in:profile,custom"] ,

            "phone" => ["nullable" , "regex:/^0[0-9]{10}$/"] ,
            "fax" => ["nullable" , "regex:/^0[0-9]{10}$/"] ,
            "mobile" => ["required_if:contact_type,==,custom" , "regex:/^09[0-9]{9}$/"] ,
            "website" => ["nullable" , "url"] ,

            "count_member" => ["required" , "numeric" , "min:1" , "max:100"] ,
            "required_gender" => ["required" , "array"] ,
            "required_gender.*" => ["required" , "in:male,female"] ,

            "type_assists" => [ "required" , Rule::in( typeAssists() ) ] ,
            "interplay_fiscals" => [ "required" , Rule::in( interplayFiscals() ) ] ,

            "salary_min" => ['required_if:interplay_fiscals,==,fixedsalary' , "min:1" ] ,
            "salary_max" => ['required_if:interplay_fiscals,==,fixedsalary' , sprintf( "min:".$this->get("salary_min") ) ] ,

            "tags" => ["required" , "array"] ,
            "tags.*" => ["required" , Rule::in($tags) ]
        ];
    }

}

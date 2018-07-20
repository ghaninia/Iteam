<?php
namespace App\Http\Requests;
use App\Models\City;
use App\Models\Province;
use App\Rules\MobileRule;
use App\Rules\PersianCharRule;
use App\Rules\UserNameRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class accountStore extends FormRequest
{

    public function authorize()
    {
        return true ;
    }

    public function rules()
    {

        return [
            'name'     => ['nullable' , "max:191" , new PersianCharRule() ] ,
            'family'   => ['nullable' , "max:191" , new PersianCharRule() ] ,
            'username' => ['required' , "max:191" , new UserNameRule() , Rule::unique('users')->ignore(Auth::guard('user')->id()) ] ,
            'email'    => ['required' , "max:191" , 'email' , Rule::unique('users')->ignore(Auth::guard('user')->id()) ] ,
            'mobile'   => ['required' , "size:11" , 'min:11' , new MobileRule() , Rule::unique('users')->ignore(Auth::guard('user')->id()) ] ,
            'phone'    => ['nullable' , 'numeric' ] ,
            'fax'      => ['nullable' , 'numeric' ] ,
            'website'  => ['nullable' , 'max:191' , 'url'] ,
            'instagram_account' => ['nullable','max:191'] ,
            'linkedin_account' => ['nullable','max:191'] ,
            'gender' => ['required' , "in:male,female"] ,
            'bio' => ['nullable' , 'max:200'] ,
            'province_id' => ['nullable' , Rule::in( Province::pluck('id')->toArray() )] ,
            'city_id' => [
                'nullable' ,
                Rule::in( City::where('province_id',$this->request->get('province_id'))->pluck('id')->toArray() )
            ] ,
            'avatar' => ['nullable' , "max:512" , "mimes:jpeg,jpg,png"] ,
            'cover'  => ['nullable' , "max:512" , "mimes:jpeg,jpg,png"]
        ];
    }
}

<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Rules\MobileRule;
use App\Rules\UserNameRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = '/profile/account';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'email' => ['required','email' ,'max:255','unique:users'],
            'mobile' => ['required',new MobileRule(),'size:11','unique:users'],
            'username' => ['required',new UserNameRule(),'max:255','unique:users'],
            'captcha' => 'required|captcha' ,
            'password' => 'required|string|min:6|confirmed',
            'privacy' => 'accepted'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' =>  $data['name'],
            'family' =>  $data['family'],
            'mobile' =>  $data['mobile'],
            'email' =>  $data['email'],
            'username' =>  $data['username'],
            'password' => Hash::make($data['password']) ,
            'plan_id' => config('timo.panel_default')
        ]);
    }

    public function showRegistrationForm()
    {
        $information = [
            'title' => trans('auth.register.text') ,
            'desc'  => trans('auth.register.desc') ,
        ] ;

        return view('auth.register' , compact('information'));
    }

    protected function registered(Request $request, $user)
    {
        return request()->json([
            'status'=> true ,
            'message' => trans('auth.register.success') ,
            'url' => route("user.profile.account.index")
        ]);
    }

}

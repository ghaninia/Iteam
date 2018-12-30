<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Rules\MobileRule;
use App\Rules\UserNameRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'email' => ['required','email' ,'max:255','unique:users'],
            'username' => ['required',new UserNameRule(),'max:255','unique:users'],
            'captcha' => 'required|captcha' ,
            'password' => 'required|string|min:6',
            'privacy' => 'accepted'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' =>  $data['username'] ,
            'email' =>  $data['email'] ,
            'password' => Hash::make($data['password']) ,
            'plan_id' => options("plan_default" , 1 )
        ]);
    }

    public function showRegistrationForm()
    {
        $information = [
            'title' => "ثبت نام" ,
            'desc'  => "همین الان عضو سایت ما شوید و از امکانات ما بهره مند شوید" ,
        ] ;

        return view('dashboard.auth.register' , compact('information'));
    }

    protected function registered(Request $request, $user)
    {
        Auth::login($user) ;
        return ResponseMsg("حساب شما ثبت گردید ایمیل جهت فعال سازی پست الکترونیک شما برای شما ارسال گردید .") ;
    }

}

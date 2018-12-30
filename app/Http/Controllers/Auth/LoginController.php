<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function showLoginForm()
    {
        $information = [
            'title' => "اکانت من" ,
            'desc'  => "وارد حساب کاربریم میخوام بشم"
        ];

        return view('dashboard.auth.login' , compact('information') );
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha' ,
        ]);
    }

    protected function guard()
    {
        $default = config('auth.defaults.guard') ;
        return Auth::guard( "user" ) ;
    }

    protected function authenticated(Request $request, $user)
    {
        return ResponseMsg(sprintf("سلام %s , شما با موفقیت وارد حساب خودتون شدید.😎" , $user->fullname )) ;
    }
}

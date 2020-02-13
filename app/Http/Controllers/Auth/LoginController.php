<?php

namespace App\Http\Controllers\Auth;
use App\Events\LogEvent;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        return view('auth.login' , compact('information') );
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

        event( new LogEvent($user , "login") ) ;

        return response()->json([
            "authunticate" => $user->remember_token ,
            "msg" => sprintf("سلام %s , شما با موفقیت وارد حساب خودتون شدید.😎" , $user->fullname ) ,
        ] , 200 ) ;

    }
}

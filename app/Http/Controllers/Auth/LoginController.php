<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function showLoginForm()
    {
        $information = [
            'title' => trans('auth.login.text') ,
            'desc'  => trans('auth.login.desc')
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
            'guard' => 'required|in:user,admin'
        ]);
    }

    protected function guard()
    {
        $default = config('auth.defaults.guard') ;
        return \Auth::guard( request()->input('guard' , $default) ) ;
    }

    protected function authenticated(Request $request, $user)
    {
        return ResMessage(trans('dash.messages.success.profile.enter' , ['attribute' => $user->username ])) ;
    }
}

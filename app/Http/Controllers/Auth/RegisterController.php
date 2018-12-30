<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Rules\UserNameRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'password' => bcrypt( $data['password'] ) ,
            'remember_token' => str_random(100) ,
            'plan_id' => options("plan_default" , 1 )
        ]);
    }

    public function showRegistrationForm()
    {
        $information = [
            'title' => trans("dash.message.success.register.title") ,
            'desc'  => trans("dash.message.success.register.desc") ,
        ] ;

        return view('dashboard.auth.register' , compact('information'));
    }

    protected function registered(Request $request, $user)
    {
        Auth::login($user) ;
        return response()->json([
            "authunticate" => $user->remember_token ,
            "msg" => trans("dash.message.success.register.create") ,
        ] , 200 ) ;
    }

}

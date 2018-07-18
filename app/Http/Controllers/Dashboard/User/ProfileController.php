<?php
namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    //*  account profile edit  *//
    public function account(Request $request)
    {
        $information = [
            'title' => trans('dash.panel.sidebar.profile.edit') ,
            'breadcrumb' => [
                trans('dash.panel.sidebar.profile.edit') => null
            ]
        ] ;

        $account = User::whereId( Auth::guard('user')->id() )
            ->withCount(['offers','teams'])
            ->with(['offers','teams'])
            ->first() ;

        return view('dash.user.profile.account' , compact('account' , 'information') ) ;
    }

    public function accountStore(Request $request)
    {
        return $request->all() ;
    }


    //*  password profile edit  *//
    public function password(Request $request)
    {
        return $request->all() ;
    }
    public function passwordStore(Request $request)
    {
        return $request->all() ;
    }


    //*  notification profile edit  *//
    public function notification(Request $request)
    {
        return $request->all() ;
    }
    public function notificationStore(Request $request)
    {
        return $request->all() ;
    }


    //*  logout profile edit  *//
    public function logout(Request $request)
    {
        $guards = array_keys(config('auth.guards')) ;
        foreach ($guards as $guard)
            if (Auth::guard($guard)->check())
            {
                Auth::guard($guard)->logout() ;
                return ResMessage( trans('dash.messages.success.logout') );
            }
        return ResMessage( trans('dash.messages.error.logout') );
    }
}

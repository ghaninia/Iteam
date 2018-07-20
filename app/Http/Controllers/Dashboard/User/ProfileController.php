<?php
namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\accountStore;
use App\Models\City;
use App\Models\File;
use App\Models\Province;
use App\Models\User;
use App\Repositories\Attachment\Attach;
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

        $account = User::withCount('teams' ,'offers')->find(Auth::guard('user')->id()) ;

        $cities  = City::whereHas("province" ,function ($q) use ($account) {
            $q->where("id" , $account->province_id);
        })->select(['id','name'])->get();

        $provinces = Province::select(['id','name'])->get() ;

        $log = $account->information() ;

        return view('dash.user.profile.account' , compact('account' , 'information','log' , 'provinces' , 'cities') ) ;
    }

    public function accountStore(accountStore $request)
    {
        $account = Auth::guard('user')->user() ;
        File::pull($account , 'avatar', 'avatar' );
        File::pull($account , 'cover', 'cover' );

        $account->update([
            'name' => $request->input('name') ,
            'family' => $request->input('family') ,
            'username' => $request->input('username') ,
            'email' => $request->input('email') ,
            'mobile' => $request->input('mobile') ,
            'website' => $request->input('website') ,
            'phone' => $request->input('phone') ,
            'fax' => $request->input('fax') ,
            'instagram_account' => $request->input('instagram_account') ,
            'linkedin_account' => $request->input('linkedin_account') ,
            'gender' => $request->input('gender') ,
            'bio' => $request->input('bio') ,
            'province_id' => $request->input('province_id') ,
            'city_id' => $request->input('city_id') ,
        ]);

        return ResMessage(trans('dash.messages.success.profile.update'));
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

<?php
namespace App\Http\Controllers\Dashboard\User;
use App\Events\LogEvent;
use App\Events\whenBuyPlanEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\accountStore;
use App\Http\Requests\passwordStore;
use App\Models\City;
use App\Models\File;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Larabookir\Gateway\Enum;
use Larabookir\Gateway\Exceptions\RetryException;
use Larabookir\Gateway\Gateway;

class ProfileController extends Controller
{

    //*  account profile edit  *//
    public function account(Request $request)
    {

        $information = [
            'title' => trans('dashboard.profile.account.label') ,
            'breadcrumb' => [
                trans('dashboard.pages.profile.label') => null
            ]
        ] ;

        $user  = me()->load( 'plan' , 'teams' ,'offers');

        $cities  = City::whereHas("province" ,function ($q) use ($user) {
            $q->where("id" , $user->province_id);
        })->select(['id','name'])->get();

        $provinces = Province::select(['id','name'])->get() ;

        return view('dashboard.user.profile.account' , compact('user' , 'information', 'provinces' , 'cities') ) ;

    }

    public function accountStore(accountStore $request)
    {
        $account = me() ;
        File::pull($account , 'picture', 'picture' );
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
        event( new LogEvent( $account , "account_edit") );

        return response()->json([
            "msg" => trans('dashboard.message.success.profile.update') ,
            "ok"  => true
        ]);
    }

    //*  password profile edit  *//
    public function password(Request $request)
    {
        $information = [
            'title' => trans("dashboard.profile.password.label") ,
            'breadcrumb' => [
                trans("dashboard.profile.password.label") => null
            ]
        ] ;

        return view("dashboard.user.profile.password" , compact('information') ) ;
    }

    public function passwordStore(passwordStore $request)
    {
        me()->update([
            'password' => bcrypt( $request->input('password') )
        ]);

        event( new LogEvent( me() , "account_pass") );

        return response()->json([
            "msg" => trans('dashboard.message.success.profile.pass') ,
            "ok"  => true
        ]);

    }

    //*  notification profile edit  *//
    public function notification(Request $request)
    {
        $information = [
            'title' => trans('dashboard.profile.notification.label') ,
            'breadcrumb' => [
                trans('dashboard.profile.notification.label') => null
            ]
        ] ;
        $user = me() ;

        return view("dashboard.user.profile.notification" , compact('information' , 'user') ) ;
    }

    public function notificationStore(Request $request)
    {
        $user = me() ;

        $user->porfileNotification()->update([
            'when_login' => $request->input('when_login' , false ) ,
            'when_create_team' => $request->input('when_create_team' , false ) ,
            'when_create_offer' => $request->input('when_create_offer' , false ) ,
            'when_edit_profile' => $request->input('when_edit_profile' , false ) ,
            'when_myteamhave_offer' => $request->input('when_myteamhave_offer' , false ) ,
            'when_expired_panel' => $request->input('when_expired_panel' , false ) ,
            'when_offer_confirmed' => $request->input('when_offer_confirmed' , false ) ,
        ]);

        return response()->json([
            "msg" => trans('dashboard.message.success.profile.notification') ,
            "ok"  => true
        ]);
    }

    //* panel profile edit *//
    public function plan(Request $request)
    {
        $information = [
            'title' => trans("dashboard.profile.plan.label") ,
            'breadcrumb' => [
                trans("dashboard.profile.plan.label") => null
            ]
        ] ;

        $plans = Plan::with("files")->where('price' , '<>' , 0 )
            ->orderBy("price" , 'desc')
            ->get() ;

        return view("dashboard.user.profile.plan" , compact('information' , 'plans') ) ;
    }

    public function planShow(Plan $plan)
    {
        return $this->planStore($plan) ;
    }

    public function planStore(Plan $plan)
    {
        $user = me()->id ;
        $gateway = Gateway::zarinpal() ;
        $gateway->setCallback( route('user.profile.plan.payment') );
        $gateway
            ->price( $plan->price )
            ->ready();

        // get authority

        Payment::create([
            'user_id' => me()->id ,
            'plan_id' => $plan->id ,
            'ref_id' => $gateway->refId() ,
            'transaction_id' => $gateway->transactionId() ,
        ]);

        // redirect payment page
        return $gateway->redirect();
    }

    public function planPayment(Request $request)
    {
        $status = false  ;
        try{
            $gateway = Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $payment = Payment::where('ref_id' , $refId)->first() ;
            Payment::where('ref_id' , $refId)->update([
                'tracking_code' => $trackingCode ,
                'status' => Enum::TRANSACTION_SUCCEED
            ]) ;

            /** update user profile plan **/
            $user = me() ;
            $user->update([
                'plan_id' => $payment->plan->id ,
                'plan_created_at' => now() ,
                'plan_expired_at' => now()->addDays( $payment->plan->max_life )
            ]);

            event( new whenBuyPlanEvent($user , $payment->plan ) ) ;

            event( new LogEvent($user , "succesed_payment") );

            $message = trans('dashboard.message.success.payment.confirm');
            $status = true ;
        }
        catch (RetryException $e){ // کاربر دوباره صفحه فاکتور را رفرش کرده است !
            $payment = Payment::where('transaction_id' , $request->input('transaction_id'))->first() ;
            $message =  $e->getMessage() ;
        }
        catch (\Exception $e) { // کاربر از پرداخت منصرف شده است .
            $message =  $e->getMessage() ;
            $payment = Payment::where('transaction_id' , $request->input('transaction_id'))->first() ;
            $payment->update(['status' => Enum::TRANSACTION_FAILED ]) ;
        }
        return redirect()->route('user.payment.show' , $payment->id )->with([
            'message' => $message ,
            'status' => $status
        ]);
    }

    //*  logout profile edit  *//
    public function logout(Request $request)
    {
        $guards = array_keys(config('auth.guards')) ;
        foreach ($guards as $guard)
            if (Auth::guard($guard)->check()){
                event( new LogEvent( Auth::guard($guard)->user() , "logout") );
                Auth::guard($guard)->logout() ;
            }

        return response()->json([
            "msg" => trans('dashboard.message.success.logout') ,
            "ok" => true
        ]);
    }

    //*  skill profile  *//
    public function skill(Request $request)
    {

    }

    public function skillStore(Request $request)
    {

    }

}

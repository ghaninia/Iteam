<?php
namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Team;
use Illuminate\Http\Request ;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $information = [
            'title' => trans('dash.pages.dashboard.label') ,
            'desc'  => trans('dash.pages.dashboard.desc')
        ] ;

        // logs widget
        $logs = $request->user()->logs()->select("key" , "created_at" )->take(10)->orderBy("created_at" , "DESC")->get() ;
        $logs->map(function ( $log ){
                $log["title"]  = trans("dash.logs.{$log->key}") ;
        }) ;

        // usage team and offer
        $usage = $request->user()->information() ;
        $precentCompleted =  $request->user()->completedProfilePrecent() ;

        return view( 'dashboard.user.main' , compact('information' , 'logs' , 'usage' , 'precentCompleted' ) ) ;
    }
}
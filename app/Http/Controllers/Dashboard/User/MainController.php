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
            'title' => trans('dashboard.pages.dashboard.label') ,
            'desc'  => trans('dashboard.pages.dashboard.desc')
        ] ;

        // logs widget
        $logs = me()
            ->logs()
            ->select("key" , "created_at" )
            ->orderBy("created_at" , "DESC")
            ->take(10)
            ->get() ;

        $logs->map(function ( $log ){
                $log["title"]  = trans("dashboard.logs.{$log->key}") ;
        }) ;

        // usage team and offer
        $usage = $request->user()->information() ;
        $precentCompleted =  $request->user()->completedProfilePrecent() ;

        return view( 'dashboard.user.main' , compact('information' , 'logs' , 'usage' , 'precentCompleted' ) ) ;
    }
}
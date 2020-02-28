<?php

namespace App\Http\Middleware;

use App\Models\PlanUser;
use Closure;

class checkPlanUserNotNull
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = $request->user() ;


        if ( is_null($user->plan_user_id) || is_null($user->plan_id) ){

            $defaultPlan = config("timo.panel_default") ;

            $defaultPlanUser = PlanUser::whereUserId( $user->id )->whereHas("plan" , function ($query) use ($defaultPlan){
                return $query->where("id" , $defaultPlan )->where("default" , true ) ;
            })->first() ;


            //just one plan default not exists
            ///////////////////////////////////
            if ( is_null($defaultPlanUser) ){
                $defaultPlanUser = $user->plansUser()->create([
                    "plan_id" => $defaultPlan
                ]);
            }


            $user->update([
                "plan_id" => $defaultPlan ,
                "plan_user_id" => $defaultPlanUser->id
            ]) ;
        }

        return $next($request) ;
    }
}

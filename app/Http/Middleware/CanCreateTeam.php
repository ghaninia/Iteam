<?php
namespace App\Http\Middleware;
use Closure;
class CanCreateTeam
{
    public function handle($request, Closure $next)
    {
        $user = me() ;
        if ( $user->plan->max_create_team > $user->myPlanTeams->count() )
            return $request($next) ;

        return response( trans("dashboard.message.error.failure_create_team" ) , 400);
    }
}

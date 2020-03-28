<?php
namespace App\Http\Middleware;
use Closure;
class CanCreateTeam
{
    public function handle($request, Closure $next)
    {
        $user = me() ;
        return ( $user->plan->max_create_team > $user->myPlanTeams->count() ) ? 
            $request($next) : 
            response( trans("dashboard.message.error.failure_create_team" ) , 400);
    }
}

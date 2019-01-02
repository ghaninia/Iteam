<?php

namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request ;

class AjaxController extends Controller
{

    public function ajaxHandle(Request $request)
    {
        $func = camel_case($request->input("action" , '')) ;
        if (method_exists($this , $func ))
            return $this->$func($request) ;
        return null ;
    }

    public function mainTeam( Request $request )
    {
        $teams = $request
            ->user()
            ->teams()
            ->orderBy("created_at" , "desc")
            ->get() ;

        $items = [] ;
        $teams->each(function ($team) use (&$items){
            $items[] = [
                "name" => $team->name ,
                "link"  => route("user.team.show" , $team->slug ) ,
                "excerpt" => $team->excerpt ,
                "created_at" => verta($team->created_at)
            ];
        });
        return $items ;
    }

}

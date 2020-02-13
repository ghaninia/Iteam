<?php

namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request ;
use Illuminate\Validation\Rule;

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

    public function checkUserExists(Request $request)
    {
        $this->validate($request , [
            "column" => "required|in:mobile,email,username" ,
            "value" => [
                "required" , Rule::unique("users" , \request("column" , "username") )->ignore( me() )
            ]
        ]) ;

        return response()->json([
            "ok" => true
        ]) ;

    }

}

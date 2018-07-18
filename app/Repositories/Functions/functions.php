<?php

function options($key , $default = null )
{
    return \App\Models\Option::get($key , $default ) ;
}

function avatar($user = null , $guard = 'user' ){
    if ( auth()->guard($guard)->check() && is_null($user))
    {
        $user = auth()->guard($guard)->user() ;
        $picture = \App\Models\File::show($user , 'avatar')->first() ;
        if (!! $picture)
            return $picture ;
        else{
            switch ($user->gender)
            {
                case "male" :
                    return asset(config('timo.avatar.male')) ;
                case "female" :
                    return asset(config('timo.avatar.female')) ;
            }
        }
    }
}

function username($user = null , $guard = 'user')
{
    if ( auth()->guard($guard)->check() && is_null($user))
    {
        $user = auth()->guard($guard)->user() ;
        if (!!$user->fullname)
            return $user->fullname ;

        return $user->username ;
    }
}

function planname($user = null)
{
    if ( auth()->guard("user")->check() && is_null($user))
    {
        $user = auth()->guard("user")->user() ;
        if ($user->plan)
            return $user->plan->name ;
    }

}

function ResMessage( $string , $status = true , $routeName = null )
{
    $request = request() ;
    $message["status"] = $status ;
    $message['message'] = $string ;
    if ($request->ajax())
        return response()->json($message) ;
    if(is_null($routeName))
        return back()->with($message) ;
    return redirect()->route($routeName)->with($message) ;
}

function str_slice($text , $length = 200 )
{
    $text = strip_tags($text) ;
    if ( strlen($text) > $length )
        return mb_substr($text , 0 , $length ) . "..." ;
    return $text ;
}
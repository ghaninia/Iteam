<?php
use App\Models\File ;

function options($key , $default = null )
{
    return \App\Models\Option::get($key , $default ) ;
}

function picture( $type , $size = 'thumbnail' )
{
    $picture = File::show( $type , null , $size)->first() ;
    if (!! $picture)
        return $picture ;
    else{
        return null ;
    }
}

function userPicture( $type , $size = 'full' , $guard = 'user' , $user = null ){
    if ( auth()->guard($guard)->check() && is_null($user))
    {
        $user = auth()->guard($guard)->user() ;
        $picture = File::show( $user , $type , $size)->first() ;
        if (!! $picture)
            return $picture ;
        else{
            switch ($type) {
                case "avatar" : {
                    switch ($user->gender)
                    {
                        case "male" :
                            return asset(config('timo.profile.avatar.male')) ;
                        case "female" :
                            return asset(config('timo.profile.avatar.female')) ;
                    }
                }
                case "cover" : {
                    return asset( config("timo.profile.cover") ) ;
                }
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

function genders()
{
    return ['male','female'] ;
}

function currency ($currency , $numberFormat = false )
{
    //*  قیمت دیفالت سیستم  *//
    $format = strtolower( config('timo.currency') ) ;

    if ( $format == 'rial' )
        return [
            'currency' => $numberFormat ?  number_format($currency) : $currency  ,
            'type' => trans('dash.currency.rial')
        ] ;
    elseif ($format == 'toman')
        return [
            'currency' => $numberFormat ?  number_format( round($currency / 10 , 2) ) : round($currency / 10 , 2) ,
            'type' => trans('dash.currency.toman')
        ];
    elseif ($format == 'thousandtoman')
        return [
            'currency' => $numberFormat ?  number_format( round($currency / 1000 , 2) ) : round($currency / 1000 , 2),
            'type' => trans('dash.currency.thousandtoman')
        ];
    elseif ($format == 'thousandrial')
        return [
            'currency' => $numberFormat ? number_format( round($currency / 10000 , 2) ) :round($currency / 10000 , 2),
            'type' => trans('dash.currency.thousandrial')
        ];
    elseif ($format == 'millionrial')
        return [
            'currency' => $numberFormat ? number_format( round($currency / 10000000 , 2) ) : round($currency / 10000000 , 2)  ,
            'type' => trans('dash.currency.millionrial')
        ];
    elseif ($format == 'milliontoman')
        return [
            'currency' => $numberFormat ? number_format( round($currency / 1000000 , 2) ) :  round($currency / 1000000 , 2) ,
            'type' => trans('dash.currency.milliontoman')
        ];
}

function me()
{
    $guards = config("auth.guards") ;
    $currentGuard = null ;
    foreach ($guards as $guard => $value )
        if  ( \Auth::guard($guard)->check() )
            $currentGuard = $guard ;

    return \Auth::guard($currentGuard)->user() ;
}

function statusTransaction($status)
{
    switch ($status)
    {
        case "SUCCEED" :
            return trans('dash.status.succeed') ;
        case "FAILED" :
            return trans('dash.status.failed') ;
        case "INIT" :
            return trans('dash.status.init') ;
    }
}

/*****************/
/*** rangeTime ***/
/*****************/

function userSearchRangeTime($justKey = true , $createColumn = 'created_at' , $requestName = "created_at" ){
    $dates =  [
        'all' => [] ,
        'today' => [
            [ $createColumn , ">=" , today() ] ,
        ] ,
        '1week' => [
            [ $createColumn , ">=" , today()->subWeek(1)]
        ],
        '2week' => [
            [ $createColumn , "<=" , today()->subWeek(1) ] ,
            [ $createColumn , ">=" , today()->subWeek(2) ]
        ],
        '1month' => [
            [ $createColumn , "<=" , today() ] ,
            [ $createColumn , ">=" , today()->subMonth(1) ]
        ],
    ];
    if ($justKey){
        return array_keys($dates) ;
    }else{
        if (request()->has($requestName))
        {
            if(array_key_exists( request()->input($requestName) , $dates ))
            {
                return $dates[ request()->input($requestName) ] ;
            }
        }
        return [] ;
    }
}
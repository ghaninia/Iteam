<?php
use App\Models\File ;
use Illuminate\Support\Facades\Route;

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

function userPicture( $type = 'avatar' , $size = 'thumbnail' , $guard = 'user' , $user = null )
{
    if ( auth()->guard($guard)->check() && is_null($user))
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
                return null ;
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

function str_slice($text , $length = 200 )
{
    $text = strip_tags($text) ;
    if ( strlen($text) > $length )
        if (mb_strlen($text) > $length )
            return mb_substr($text , 0 , $length ) . "..." ;
        else
            return mb_substr($text , 0 , $length ) ;
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

/***********************/
/*** change currency ***/
/***********************/
function changeCurrency($currency , $changeTo = 'rial')
{
    $format = strtolower( config('timo.currency') ) ;
    $changing   =
        [
            //*  *//
            'rial' => [
                'rial'   => 1 ,
                'toman'  => .1 ,
                'thousandtoman' => .0001 ,
                'thousandrial'  => .001 ,
            ],

            'toman' => [
                'rial'   => 10 ,
                'toman'  => 1 ,
                'thousandtoman' => .001 ,
                'thousandrial'  => .01 ,
            ],

            'thousandtoman' => [
                'rial'   => 10000 ,
                'toman'  => 1000 ,
                'thousandtoman' => 1 ,
                'thousandrial'  => 10 ,
            ],

            'thousandrial' => [
                'rial'   => 1000 ,
                'toman'  => 100 ,
                'thousandtoman' => .1 ,
                'thousandrial'  => 1 ,
            ],
        ];

    return $changing[$format][$changeTo] * $currency ;
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

function userSearchRangeTime($justKey = true , $requestName = "created_at" , $createColumn = 'created_at'  ){
    $dates =  [
        'all' => [] ,
        'today' => [
            [ $createColumn , ">=" , today() ] ,
        ] ,
        'yesterday' => [
            [ $createColumn , "<" , today() ] ,
            [ $createColumn , ">=" , today()->subDay(1) ]
        ],
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

/*** mac address ***/
function macAddress(){
    ob_start();
    system('ipconfig /all');
    $mycom=ob_get_contents();
    ob_clean();
    $findme = "Physical";
    $pmac = strpos($mycom, $findme);
    $mac=substr($mycom,($pmac+36),17);
    return $mac;
}

/*** create slug ***/
function slug($name){
    $lettersNumbersSpacesHyphens = '/[^\-\s\pN\pL]+/u';
    $spacesDuplicateHypens = '/[\-\s]+/';
    $slug = preg_replace($lettersNumbersSpacesHyphens, null , $name );
    $slug = preg_replace($spacesDuplicateHypens, '-', $slug);
    $slug = trim($slug, '+');
    if($slug[strlen($slug)-1] == "-"){
        $slug = substr($slug , 0 , strlen($slug)-1) ;
    }
    return $slug ;
}

/**typeAssists**/
function typeAssists(){
    return [
        'telework' ,
        'fulltime' ,
        'parttime' ,
        'internship'
    ] ;
}

function interplayFiscals(){
    return [
        'bothfounder' ,
        'partnership' ,
        'fixedsalary'
    ];
}

function activeSidebar ($route , $routeName = false , $classDefault = "active") {
   if ($routeName){
       $routeNamed =  Route::currentRouteName()  ;
       if( is_string($route) ){
           return $routeNamed == $route ? "class={$classDefault}" : null ;
       }elseif ( is_array($route) ){
           return in_array( $routeNamed , $route ) ? "class={$classDefault}" : null ;
       }
   }else{
       if ( request()->is("{$route}/*") ){
           return "class={$classDefault}";
       }
       return null;
   }
}
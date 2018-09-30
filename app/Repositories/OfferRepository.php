<?php
namespace App\Repositories;
class OfferRepository
{
    public static $appends = null ;

    public static function paginate($team , $offest = 4)
    {
        $request = request() ;
        $appends = $request->except('more') ;
        $offers_count = $team->offers->count() ;
        $prepage = $request->input('more' , 0) ;
        if ( $prepage > 0 )
            $prepage = $prepage * $offest ;

        $offers  = $team->offers()->skip( $prepage )->take($offest)->get() ;

        if ( $offers_count > $prepage + $offest )
            $appends['more'] = $prepage + 1 ;

        static::$appends = $appends ;
        return $offers ;
    }

    public function appends()
    {
        return static::$appends ;
    }

}
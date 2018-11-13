<?php
namespace App\Repositories;
class OfferRepository
{
    public static $appends = null ;

    public static function paginate($team , $offest = 4 ,$search)
    {
        $request = request() ;
        $appends = $request->except('more') ;
        $offers_count = $team->offers->count() ;
        $prepage = $request->input('more' , 0) ;
        if ( $prepage > 0 )
            $prepage = $prepage * $offest ;


        $offers  = $team->offers()->when($search , function ($query) use ($search){
            $query->whereHas("user", function ($query) use ($search){
                $query->where("username" , "like" , "%{$search}%")
                        ->orWhereRaw("CONCAT(name,' ',family) like ?" , ["%{$search}%"]) ;
            }) ;
        }) ;

        $offers_count = $offers->count() ;
        $offers = $offers->skip( $prepage )->take($offest)->get() ;
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

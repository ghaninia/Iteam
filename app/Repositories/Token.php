<?php
namespace App\Repositories;

class Token
{
    private static $tokenPrefix = "_token" ;
    private static $maxSizeSession = 15 ;

    // skill Genearate
    public static function Generate(string $name , int $length = 10)
    {
        $token    = str_random($length) ;
        $prefix   = $name.static::$tokenPrefix ;
        $maxSize  = static::$maxSizeSession ;
        $session  = session($prefix , [] );
        if (count($session) > $maxSize)
            $session = [] ;

        $session[] = $token ;
        session()->put($prefix , $session);

        return $token ;
    }

    // skill Compare
    public static function Compare(string $name , string $token)
    {
        $prefix   = $name.static::$tokenPrefix ;
        $sessions = session($prefix , []) ;
        $search = array_search($token , $sessions) ;
        if ($search > 0)
        {
            unset($sessions[$search]) ;
            session()->put($prefix , $sessions) ;
            return true  ;
        }
        return false ;
    }


}
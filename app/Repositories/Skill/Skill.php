<?php
namespace App\Repositories\Skill;
class Skill
{
    private $filename = "skills.json" ;
    private $tokenPrefix = "skill_token" ;
    private $maxSizeSession = 10 ;

    public function GenerateToken($length = 10)
    {
        $token    = str_random($length) ;
        $prefix   = $this->tokenPrefix ;
        $maxSize  = $this->maxSizeSession ;
        $sessions = session($prefix , []) ;

        if (count($sessions) > $maxSize)
            $sessions = [] ;

        array_push($sessions , $token ) ;

        session()->put([$prefix => $sessions ]) ;

        return $sessions ;
    }

    public function CompareToken($token)
    {
        $prefix   = $this->tokenPrefix ;
        $sessions = session($prefix , []) ;
        $index = array_search($token , $sessions );

        dd(session()->put([$prefix => $sessions ])) ;
        if ( $index )
        {
            unset($sessions[$index]) ;
            return true ;
        }

        return false ;
    }

}
<?php
namespace App\Http\Controllers\Dashboard\Api ;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    public function skill($skill , Request $request)
    {
        $name = 'skills' ;
        if ( !Cache::has($name) )
        {
            $skills =  Skill::pluck('name','id')->toJson()  ;
            Cache::put($name , $skills , 1 ) ;
        }
        else
            $skills = Cache::get($name) ;
        return $skills ;
    }
}

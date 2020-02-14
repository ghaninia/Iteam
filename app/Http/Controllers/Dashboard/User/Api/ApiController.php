<?php
namespace App\Http\Controllers\Dashboard\User\Api;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{

    public function tags( Request $request )
    {
        $name = 'tags' ;
        if ( !Cache::has($name) )
        {
            $tags =  Tag::select(["slug" , "name" , "icon"])->get() ;
            Cache::put( $name , $tags , 10 ) ;
        }
        else
            $tags = Cache::get($name) ;
        return [
            "ok" => true ,
            "tags" => $tags
        ] ;
    }

    public function skills(Request $request)
    {

        $this->validate($request , [
            "s" => [ 'nullable' ] ,
            "tag_id" => [ "nullable" , Rule::in( Tag::pluck("slug")->toArray() ) ]
        ]);

        $s      = $request->input("s")   ;
        $tag    = $request->input("tag_id") ;
        if ( !!$tag ){
            $TAG_NAME = Tag::where("slug" , $tag)->first()->name ;
        }

        $skills =  Skill::select(["id" , "name"])->when($s , function ($query) use ($s) {
            $query->where("name" , "like" , "%{$s}%");
        })->when($tag , function ($query) use ($tag){
            return $query->whereHas("tag" , function ($q) use ($tag) {
                return $q->where("tags.slug" , $tag ) ;
            });
        })->get() ;

        return response()->json([
            "ok" => true ,
            "title" => $s ?? $TAG_NAME ?? "ALL" ,
            "skills" => $skills ,
            "self" => me()->skills->pluck("id")->toArray()
        ]) ;
    }

}

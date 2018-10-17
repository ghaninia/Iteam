<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\Tag;
use Illuminate\Http\Request ;
use Illuminate\Validation\Rule;

class AjaxController extends Controller
{

    public function ajaxHandle(Request $request)
    {
        $func = camel_case($request->input("action" , '')) ;
        if (method_exists($this , $func ))
            return $this->$func($request) ;
    }

    public function MyCities(Request $request)
    {
        $this->validate($request , [
            'province_id' => ['required' , Rule::in( Province::pluck('id')->toArray() ) ]
        ]);

        $cities = City::whereHas("province" ,function ($q) use ($request) {
            $q->where( "id" , $request->input('province_id') );
        })->select(['id','name'])->get()->toArray();

        return $this->response(200 , $cities ) ;
    }

    public function ChildTag(Request $request)
    {
        $this->validate($request , [
            'tag_id' => ['required' , Rule::in( Tag::Orphan()->pluck('id')->toArray() ) ]
        ]);

        $tag = Tag::find($request->input('tag_id')) ;
        $response = $tag->childerns()->select(['id','name'])->get()->toArray() ;

        return $this->response(200 , $response ) ;
    }

    public function Skills(Request $request)
    {
        $this->validate($request , [
            'child_tag_id' => ['required' , Rule::in(Tag::EmptyOrphan()->pluck('id')->toArray() ) ]
        ]);

        $tag = Tag::find($request->input('child_tag_id')) ;
        $response = $tag->skills()->select(['id','name'])->get()->toArray() ;

        return $this->response(200 , $response ) ;
    }


    public function response($code , $msg)
    {
        return response()->json(['code' => $code , 'msg' => $msg ]) ;
    }
    
}

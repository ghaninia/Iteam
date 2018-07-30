<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajaxController extends Controller
{
	public function ajaxHandle(Request $request)
    {
        if ($request->has("action"))
        {
            $func = camel_case($request->action) ;
            if (method_exists($this , $func ))
            {
                return $this->$func($request) ;
            }
        }
        return $this->response(404 , 'متاسفانه دسترسی لازم تعلق نگرفته است .') ;
    }

}

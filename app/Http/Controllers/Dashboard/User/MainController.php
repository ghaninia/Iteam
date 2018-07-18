<?php
namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request ;

class MainController extends Controller
{
    public function index()
    {
        $information = [
            'title' => trans('dash.panel.user.main') ,
//            'breadcrumb' => [
//                trans('dash.panel.sidebar.profile.edit') => null
//            ]
        ] ;
        return view( 'dash.user.main' , compact('information') ) ;
    }
}
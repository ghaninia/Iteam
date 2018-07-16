<?php
namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        $user = auth()->guard('user')->loginUsingId(1) ;
        return File::show($user , 'avatar' , 'image' );
    }

    public function store(Request $request)
    {
        $user = auth()->guard('user')->user() ;
        File::create($user , 'attachment' , 'avatar' );
    }

}

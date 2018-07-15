<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Attachment\Attach ;

class TestController extends Controller
{

    public function index()
    {
        return view("welcome");
    }

    public function store(Request $request)
    {
        return Attach::disk('local')->put("attachment");
    }
}

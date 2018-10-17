<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        if ($request->ajax())
            return response()->json([
                'ok' => true ,
            ]);

        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->ajax())
            return response()->json([
                'ok' => true ,
            ]);

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }


    protected function validateEmail(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email' ,
            'captcha' => 'required|captcha'
        ]);
    }
}



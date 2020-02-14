<?php

namespace App\Http\Middleware;
use App\Repositories\Token;
use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{
    public function handle(Request $request, Closure $next , $sessionName )
    {
        $token = $request->route('token') ;
        if (Token::Compare($sessionName , $token))
            return $next($request);

        return response()
                ->json([
                        'status' => false ,
                        'message' => trans('dashboard.message.error.token_expired'
                    )]) ;
    }
}

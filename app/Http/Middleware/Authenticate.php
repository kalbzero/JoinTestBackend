<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Authenticate extends Middleware
{

    protected function redirectTo(Request $request): ?string
    {
        // if (!$request->expectsJson()) {
        //     return route('login');
        // }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // try {
        //     if (!$user = JWTAuth::parseToken()->authenticate()) {
        //         return response()->json(['error' => 'Unauthorized'], 401);
        //     }
        // } catch (JWTException $e) {
        //     return response()->json(['error' => 'Token is invalid'], 401);
        // }

        return $next($request);
    }
}

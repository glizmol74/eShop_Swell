<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
        $user = JWTAuth::parseToken()->authenticate();
    } catch( Exception $e) {
        if ( $e instanceof TokenExpiredException) {
            return response()->json([
                'status' => false,
                'message' => 'Token Expirado'
            ]);
        } elseif( $e instanceof TokenInvalidException) {
            return response()->json([
                'status' => false,
                'message' => 'Token Invalido'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Token es Requerido'
            ]);
        }
    }
        return $next($request->merge(['user' => $user]));
    }
}

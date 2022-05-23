<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $perfil)
    {
        if (! $request->user()->validarPermiso($perfil))
            return response()->json([
                'status' => false,
                'message' => 'Permiso Denegado'
            ]);
        return $next($request);
    }
}

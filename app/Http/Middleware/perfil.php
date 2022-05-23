<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class perfil
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
        if (! $request->user()->validarPermiso($perfil)) {
            return redirect('login');
        }
        return $next($request);
    }
}

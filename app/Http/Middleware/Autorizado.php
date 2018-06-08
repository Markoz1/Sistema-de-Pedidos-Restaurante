<?php

namespace App\Http\Middleware;

use Closure;

class Autorizado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->esAdministrador() || auth()->user()->esCajero() || auth()->user()->esCocinero()){
            return $next($request);
        }            
        else {
            abort(403);
        }
    }
}

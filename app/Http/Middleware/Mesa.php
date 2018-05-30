<?php

namespace App\Http\Middleware;

use Closure;

class Mesa
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
        if(auth()->user()->esMesa()){
            return $next($request);
        }            
        else {
            abort(403);
        }
    }
}

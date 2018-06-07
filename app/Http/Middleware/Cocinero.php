<?php

namespace App\Http\Middleware;

use Closure;

class Cocinero
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
        if(auth()->user()->esCocinero()){
            return $next($request);
        }            
        else {
            if(auth()->user()->esAdministrador() || auth()->user()->esCajero()){
               return $next($request);                     
            }
            else{
                abort(403);
            }
        }
    }
}

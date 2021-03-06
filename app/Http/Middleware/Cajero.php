<?php

namespace App\Http\Middleware;

use Closure;

class Cajero
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
        if(auth()->user()->esCajero()){
            return $next($request);
        }            
        else {
            if(auth()->user()->esAdministrador()){
               return $next($request);                     
            }
            else{
                abort(403);
            }
        }
    }
}

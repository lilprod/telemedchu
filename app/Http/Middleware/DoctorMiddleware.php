<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class DoctorMiddleware
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
        if (Auth::user()->hasPermissionTo('Doctor Permissions')) { //If user has this //permission
            return $next($request);
        }  

        /* if ($request->is('/consultations')) {//If user is creating a prestation
            if (!Auth::user()->hasPermissionTo('Doctor Permissions')) {
                abort('401');
            } else {
                return $next($request);
            }
        } */
        
        return $next($request);
    }
}

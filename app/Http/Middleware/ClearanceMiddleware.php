<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class ClearanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasPermissionTo('Patient Permissions')) { //If user has this //permission
            return $next($request);
        }

        if ($request->is('/dashboard')) { //If user has this //permission
            if (!Auth::user()->hasPermissionTo('Roles Administration & Permission')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('/myprescriptions')) {//If user is creating a prestation
            if (!Auth::user()->hasPermissionTo('View Prescription')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('prestations/*/edit')) { //If user is editing a prestation
            if (!Auth::user()->hasPermissionTo('Edit Prestation')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) { //If user is deleting a prestation
            if (!Auth::user()->hasPermissionTo('Delete Prestation')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('categories/create')) {//If user is creating a category
            if (!Auth::user()->hasPermissionTo('Create Categorie')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('categories/*/edit')) { //If user is editing a category
            if (!Auth::user()->hasPermissionTo('Edit Categorie')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) { //If user is deleting a category
            if (!Auth::user()->hasPermissionTo('Delete Categorie')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('societes/create')) {//If user is creating a company
            if (!Auth::user()->hasPermissionTo('Create Societe')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('societes/*/edit')) { //If user is editing a Company
            if (!Auth::user()->hasPermissionTo('Edit Societe')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) { //If user is deleting a Company
            if (!Auth::user()->hasPermissionTo('Delete Societe')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}

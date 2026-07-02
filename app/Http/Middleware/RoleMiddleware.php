<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /*
    |--------------------------------------------------------------------------
    | HANDLE INCOMING REQUEST
    |--------------------------------------------------------------------------
    */

    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        /*
        |--------------------------------------------------------------------------
        | MUST BE LOGGED IN
        |--------------------------------------------------------------------------
        */

        if (! $request->user()) {

            abort(401);

        }

        /*
        |--------------------------------------------------------------------------
        | ROLE MUST MATCH ONE OF THE ALLOWED ROLES
        |--------------------------------------------------------------------------
        */

        if (! in_array($request->user()->role, $roles)) {

            abort(403, 'You are not authorized to access this page.');

        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = is_array($role) ? $role : explode('|', $role);
        
        if ( ! in_array( auth()->user()->role_id, $roles) ) {
            abort(401, __("No puedes acceder a esta zona"));
        }

        return $next($request);
    }
}

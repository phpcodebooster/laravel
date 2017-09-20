<?php

namespace PCB\Laravel\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if( Auth::check() )
        {
            // allow admin to proceed with url
            if ( Auth::user()->hasAdminAccess() ) {
                 return redirect(route(config('modules.auth.admin_redirect_route')));
            }

            // if user is client take him to his dash
            else if ( Auth::user()->isUser() ) {
                 return redirect(route(config('modules.auth.user_redirect_route')));
            }
        }

        return $next($request);
    }
}

<?php

namespace PCB\Laravel\Middleware;

use Auth;
use Closure;

class UserAuthenticated
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
        if( Auth::check() )
        {
            // if admin take him to admin dash
            if ( Auth::user()->hasAdminAccess() ) {
                 return redirect( route('admin_dashboard') );
            }

            // if user is client take him to his dash
            else if ( Auth::user()->isUser() ) {
                 return $next($request);
            }
        }

        abort(404);
    }
}

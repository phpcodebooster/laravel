<?php

namespace PCB\Laravel\Middleware;

use Auth;
use Closure;

class AdminAuthenticated
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
            // allow admin to proceed with url
            if ( Auth::user()->hasAdminAccess() ) {
                 return redirect(route(config('modules.auth.admin_redirect_route')));
            }
        }

        abort(404);
    }
}

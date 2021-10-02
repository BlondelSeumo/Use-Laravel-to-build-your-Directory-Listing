<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComingSoonRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $setting = false;
        if ($setting) {
            if( !is_admin() && !($request->getRequestUri() == '/login' or $request->routeIs('site.down')) and $request->isMethod('get')){
                return redirect()->route('site.down');
            }
        }
        return $next($request);
    }
}

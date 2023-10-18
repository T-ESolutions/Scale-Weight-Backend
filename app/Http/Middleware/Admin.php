<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            if (!Auth::guard('admin')->user()->active) {
                return msg(false, trans('lang.you_not_active_contact_admin'), not_acceptable());
            }
            return $next($request);
        } else {
            return msg(false, trans('lang.should_login_first'), not_auth());

        }
    }
}

<?php

namespace Monitor\Http\Middleware\User;

use Closure;

class ProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if(!auth()->user()->profile_status) {
            return redirect()->route('dashboard.account.profile')->with('warning', 'Please complete your profile...');
        }
        return $next($request);
    }
}

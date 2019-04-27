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
        // Please note here complete = 1 means user has completed his profile 
        if(!auth()->user()->profile_status) {
            //return redirect(route('dashboard.account.profile'));
            return redirect()->route('dashboard.account.profile')->with('warning', 'Please complete your profile...');
        }
        
        return $next($request);
    }
}

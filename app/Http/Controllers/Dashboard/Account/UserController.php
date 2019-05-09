<?php

namespace Monitor\Http\Controllers\Dashboard\Account;

use Illuminate\Http\Request;
use Monitor\Http\Controllers\Controller;

class UserController extends Controller
{
    public function completeProfile(Request $request)
    {
        //dd($request->user());
        session()->put('success','Welcome'.' '.auth()->user()->name);
        return view('dashboard.account.profile');
    }

    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        // $request->user() returns an instance of the authenticated user...
    }
}

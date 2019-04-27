<?php

namespace Monitor\Http\Controllers\Dashboard\Account;

use Illuminate\Http\Request;
use Monitor\Http\Controllers\Controller;

class UserController extends Controller
{
    public function completeProfile()
    {
        return view('dashboard.account.profile');
    }
}

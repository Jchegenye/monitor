<?php

namespace Monitor\Http\Controllers\Dashboard\Monitoring\Uptime;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Monitor\Http\Controllers\Controller;
use Monitor\ReusableCodes\Uptime\UptimeChecker;
use Monitor\Model\WebsitesMonitor;
use DB;

class WebsitesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        return view('dashboard.monitoring.uptime.websites');
    }

}

<?php

namespace Monitor\Model;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class WebsitesMonitor extends Eloquent
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['site_info'];


    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $collection = "uptime";

    // protected $casts = [
    //     'site_info' => 'array'
    // ];

}

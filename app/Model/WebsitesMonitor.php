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
    protected $fillable = ['success','status', 'message', 'transfer_time'];

    // protected $casts = [
    //     'site_info' => 'array'
    // ];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $collection = "uptime";

    //protected $appends = ['createdDate'];


    public function user()
    {
    return $this->belongsTo(\Monitor\User::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}

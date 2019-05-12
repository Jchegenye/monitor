<?php

namespace Monitor\Model;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Notifications extends Eloquent
{

    protected $connection = 'mongodb';
    
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $collection = "notifications";

    public function items()
    {
        return $this->hasMany('Monitor\Model\WebsitesMonitor');
    }

}

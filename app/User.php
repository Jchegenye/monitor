<?php

namespace Monitor;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

//use Illuminate\Notifications\Notifiable; 
use Monitor\ReusableCodes\LaraOverrides\Notifications\Notifiable;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;



class User extends Eloquent  implements Authenticatable,CanResetPasswordContract
{
    
    use Notifiable,AuthenticableTrait,CanResetPassword;

    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'notify_status', 'profile_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $collection = "users";

    /**
     * Route notifications for the Slack channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForSlack($notification)
    {
        return config('app.slack_webhook_url');
    }


    public function posts()
    {
        return $this->hasMany(Model\WebsitesMonitor::class);
    }

}

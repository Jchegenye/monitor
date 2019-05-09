<?php

namespace Monitor\ReusableCodes\LaraOverrides\Notifications;

use Illuminate\Notifications\RoutesNotifications;

trait Notifiable
{
    use HasDatabaseNotifications, RoutesNotifications;
}
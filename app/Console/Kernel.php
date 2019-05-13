<?php

namespace Monitor\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\InitializeMonitoringWebsites::class,
        Commands\DownTimeWebsitesChecker::class,
        Commands\UpTimeWebsitesChecker::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (app()->environment('production')) {
            $schedule->command('monitoring:initialize-websites')
                ->everyMinute()
                ->runInBackground()
                ->timezone('Africa/Nairobi');

            $schedule->command('monitoring:down-websites')
                ->everyMinute()
                ->runInBackground()
                ->timezone('Africa/Nairobi')
                ->withoutOverlapping(1);

            $schedule->command('monitoring:up-websites')
                ->everyMinute()
                ->runInBackground()
                ->timezone('Africa/Nairobi')
                ->withoutOverlapping(1);
        }
            
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

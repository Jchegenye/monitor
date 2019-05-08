<?php

namespace Monitor\Console\Commands;


use Monitor\ReusableCodes\Uptime\UptimeChecker;
use Monitor\Model\WebsitesMonitor;
use Carbon\Carbon;
use Illuminate\Console\Command;

class InitializeMonitoringWebsites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitoring:initialize-websites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will initialize monitoring of websites by updating & storing of new website data in our database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //Get all uptime data (array)
        $checker = new UptimeChecker();

            foreach((object)$checker->results() as $arr)
            {

                WebsitesMonitor::where('_id', $arr['domain_id'])
                    ->update([
                        'uri'  => $arr['host'],
                        'success' => $arr['success'],
                        'status' => $arr['status'],
                        'message' => $arr['message'],
                        'transfer_time' => $arr['transfer_time'],
                    ]);

            }

    }
}

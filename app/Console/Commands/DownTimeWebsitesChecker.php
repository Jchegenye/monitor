<?php

namespace Monitor\Console\Commands;

use Illuminate\Console\Command;
use Monitor\Model\WebsitesMonitor;
use Monitor\User;
use Carbon\Carbon;
use DB;

class DownTimeWebsitesChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitoring:down-websites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will keep checking down websites every minute from our database.';

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
        
        $websites = WebsitesMonitor::where('success', false)->whereNull('mail_status')->get();
        foreach ((object)$websites as $key_1 => $val_1) 
        {
            
            if($websites){
                //get user data & website data including downtime using "updated_at"

                //send mail

                //update/insert mail_status value to "mailed" and insertOrUpdate "downtime" using "updated_at"
            }

        }
        
    }
}

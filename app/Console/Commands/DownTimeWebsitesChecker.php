<?php

namespace Monitor\Console\Commands;

use Illuminate\Console\Command;
use Notification;
use Monitor\Notifications\Websites\DownTimeNotifier;

use Monitor\Model\WebsitesMonitor;
use Monitor\ReusableCodes\Helpers\CommonHelper;
use Monitor\User;
use Monitor\Model\Notifications;
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
    protected $description = 'This command will keep checking down websites every minute from our database & nofify users.';

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
        
        $users = User::where('profile_status', (int)1)->select('email','name')->get();
        $websites = WebsitesMonitor::where('success', false)->whereNull('mail_status')->select('uri','site_info','updated_at')->get();
        $notifications = Notifications::where('status',"=", 'down')->get();
        
        foreach ((object)$websites as $key_1 => $details)
        {
            
            if($websites){
                
                $notifications = Notifications::where('data.website_id',"=",$details->id)->get();

                if($notifications->isEmpty()){

                        foreach ($users as $key => $user) {
                            
                            
                            Notification::send($user, new DownTimeNotifier($details,$user));
        
                            //update/insert mail_status value to "mailed" and insertOrUpdate "downtime" using "updated_at"
        
                        }
                    
                }else{


                    $notifications->each(function($item){
                        if($item->data['status'] !== "down"){
 
                            if($notifications->pluck('status')[0] !== "down"){
        
                                foreach ($users as $key => $user) {
                                    
                                    Notification::send($user, new DownTimeNotifier($details,$user));
                
                                    //update/insert mail_status value to "mailed" and insertOrUpdate "downtime" using "updated_at"
                
                                }
        
                            }

                        }
                    });

                }
                
            }

        }
        
    }
}

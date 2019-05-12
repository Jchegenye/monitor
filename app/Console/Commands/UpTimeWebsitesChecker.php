<?php

namespace Monitor\Console\Commands;

use Illuminate\Console\Command;
use Notification;
use Monitor\Notifications\Websites\UpTimeNotifier;

use Monitor\Model\WebsitesMonitor;
use Monitor\ReusableCodes\Helpers\CommonHelper;
use Monitor\User;
use Monitor\Model\Notifications;
use Carbon\Carbon;
use DB;

class UpTimeWebsitesChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitoring:up-websites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will keep checking up websites every minute from our database & nofify users.';

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
        
        $users = User::where('profile_status', (int)1)->select('email','name')->get(); //get all subscribed users to received emails.
        $websites = WebsitesMonitor::where('success', true)->select('uri','site_info','updated_at')->get(); //get all runing websites

        foreach ($websites as $key1 => $details) {

            $notifications = Notifications::where('data.status',"=", 'down')
                ->where('data.website_id',"=", $details->id)
                ->get();

                if($notifications){

                    foreach ($notifications as $keyn1 => $notify) {

                        //Duration it took when down.
                        $uptime = Carbon::parse($details->updated_at);
                        $downtime = Carbon::parse($notify->data['downtime']['date']);
                        $totalDuration = $uptime->diffForHumans($downtime);

                        //Record uptime data
                            Notifications::where('data.status',"=", 'down')
                                ->where('data.website_id',"=", $details->id)
                                ->update([
                                    'data' => [
                                        'status' => 'up',
                                        'uptime' => $details->updated_at,
                                        'downtime' => $notify->data['downtime'],
                                        'message' => 'Good news! '.$details->site_info['site_name'].' is UP again at '.$details->updated_at.'. Downtime took '.$totalDuration.'. '.$details->uri.'',
                                    ]
                                ]);

                        foreach ($users as $key => $user) {
                        
                            Notification::send($user, new UpTimeNotifier($details,$notify,$user,$totalDuration));
        
                        }

                    }

                }

            //var_export($notifications->toArray());

        }

        
        
        
        
    }
}

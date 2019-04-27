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
    protected $signature = 'initialize:monitoring-websites';

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
        
        // Retrieve all stored uptime data
        $websites = WebsitesMonitor::all();

        //Get all uptime data (array)
        $checker = new UptimeChecker();
            
        if($websites->isEmpty())
        {
            //store a new websites data
            foreach((array)$checker->results() as $arr){
                $website = new WebsitesMonitor();
                foreach ((array)$arr as $key1 => $value) {
                    $website->$key1 = $value;
                    $website->site_info = $arr['site_info'];
                }
                $website->save();
            }
            echo "Monitoring initialized!";
        }
        else{

            foreach((object)$checker->results() as $arr){
                
                foreach ((object)$arr as $key1 => $value1) {

                    foreach ((object)$value1 as $key => $value2) {

                        //Update existing websites data, else store a new websites data
                        $website = WebsitesMonitor::where('uri',"=", $arr['uri'])->first();
                        if($website){

                            WebsitesMonitor::where('uri', $arr['uri'])->update([
                                $key1 => $value2,
                                'site_info' => $arr['site_info']
                            ]);

                        }else{

                            $website = new WebsitesMonitor();
                            foreach ((array)$arr as $key1 => $value) {
                                $website->$key1 = $value;
                                $website->site_info = $arr['site_info'];
                            }
                            $website->save();

                        }
                        
                    }

                }

            }
            
        }

    }
}

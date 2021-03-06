<?php

namespace App\Console\Commands;

use Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Console\Command;
use DB; //For transactions
use Event;
use GeoIP;
use SegmentIO\Client;

class prcSys_Insert_Traffic_GW extends Command
{ 

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:prcSys_Insert_Traffic_GW';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizacion de External Contact';
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $log = new Logger('prcSys_Insert_Traffic_GWLogs');
        $log->pushHandler(new StreamHandler('storage/logs/.log', Logger::INFO));
        
        $prcSys = DB::Select('SET NOCOUNT ON exec prcSys_Insert_Traffic_GW');
        
        $log->addInfo("Cron prcSys_Insert_Traffic_GW Executed");
        $this->info('Cron prcSys_Insert_Traffic_GW execute correctly');
    }
}

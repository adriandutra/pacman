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

class prcSys_Insert_Contact_History extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:prcSys_Insert_Contact_History';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insercion de Contact History';
    
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
        $log = new Logger('prcSys_Insert_Contact_HistoryLogs');
        $log->pushHandler(new StreamHandler('storage/logs/.log', Logger::INFO));
        
        $prcSys = DB::Select('SET NOCOUNT ON exec prcSys_Insert_Contact_History');
        
        $log->addInfo("Cron prcSys_Insert_Contact_History Executed");
        $this->info('Cron prcSys_Insert_Contact_History execute correctly');
    }
}
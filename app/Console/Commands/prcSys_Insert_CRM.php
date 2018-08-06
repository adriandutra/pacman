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

class prcSys_Insert_CRM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:prcSys_Insert_CRM';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizacion de Servidores';
    
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
        
            $log = new Logger('prcSys_Insert_CRMLOGS');
            $log->pushHandler(new StreamHandler('storage/logs/prcSys_Insert_CRM.log', Logger::INFO));
        
            $StartTime = DB::Select('SELECT CONVERT(datetime,  GETDATE()) as Fecha');  
        
            $upTable = DB::table('DailyProcess')->Insert(
                           ['Name'   => 'prcSys_Insert_CRM',
                            'sysout' => 1,
                            'StartTime'  => $StartTime[0]->Fecha,
                            'EndTime'    => NULL
                            ] 
                        );
        
            $prcSys = DB::Select('SET NOCOUNT ON exec prcSys_Insert_Crms');
        
            $log->addInfo("Cron prcSys_Insert_CRM Executed");
            $this->info('Cron prcSys_Insert_CRM execute correctly');
        
            $EndTime = DB::Select('SELECT CONVERT(datetime,  GETDATE()) as Fecha');
        
            $upTable = DB::table('DailyProcess')
                         ->where('Name', 'prcSys_Insert_CRM')
                         ->where('StartTime', $StartTime[0]->Fecha)
                         ->update(['Sysout' => 0, 'EndTime' => $EndTime[0]->Fecha]);
            
    }
}

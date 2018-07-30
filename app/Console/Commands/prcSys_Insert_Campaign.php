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

class prcSys_Insert_Campaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:prcSys_Insert_Campaign';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizacion de campanas';
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
        
        $flag = DB::table('DailyProcess')
                    ->where('Name', 'prcSys_Insert_CRM')
                    ->where('Sysout', 0)
                    ->whereRaw('convert(varchar, EndTime, 112) = convert(varchar, getdate(), 112)')
                    ->whereRaw('(Select count(*) From DailyProcess Where Name = \'prcSys_Insert_Campaign\' and convert(varchar, EndTime, 112) = convert(varchar, getdate(), 112) and Sysout = 0) = 0')
                    ->first();       
        
        if ($flag->id) {
        
            $log = new Logger('prcSys_Insert_CampaignLogs');        
            $log->pushHandler(new StreamHandler('storage/logs/prcSys_Insert_Campaign.log', Logger::INFO));
        
            $StartTime = DB::Select('SELECT CONVERT(datetime,  GETDATE()) as Fecha');
        
            $upTable = DB::table('DailyProcess')->Insert(
                           ['Name'   => 'prcSys_Insert_Campaign',
                            'sysout' => 1,
                            'StartTime'  => $StartTime[0]->Fecha,
                            'EndTime'    => NULL
                            ]
                        );
        
            $prcSys = DB::Select('SET NOCOUNT ON exec prcSys_Insert_Campaing');
        
            $log->addInfo("Cron prcSys_Insert_Campaing Executed");
            $this->info('Cron prcSys_Insert_Campaing execute correctly');
        
            $EndTime = DB::Select('SELECT CONVERT(datetime,  GETDATE()) as Fecha');
        
            $upTable = DB::table('DailyProcess')
                        ->where('Name', 'prcSys_Insert_Campaign')
                        ->where('StartTime', $StartTime[0]->Fecha)
                        ->update(['Sysout' => 0, 'EndTime' => $EndTime[0]->Fecha]);
        }
    }   
    
}

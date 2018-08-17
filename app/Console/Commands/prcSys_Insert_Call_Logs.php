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

class prcSys_Insert_Call_Logs extends Command
{
 
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:prcSys_Insert_Call_Logs';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insercion de Call Logs';
    
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
                    ->where('Name', 'prcSys_Insert_Logins')
                    ->where('Sysout', 0)
                    ->whereRaw('convert(varchar, EndTime, 112) = convert(varchar, getdate(), 112)')
                    ->whereRaw('(Select count(*) From DailyProcess Where Name = \'prcSys_Insert_Call_Logs\' and convert(varchar, EndTime, 112) = convert(varchar, getdate(), 112) and Sysout = 0) = 0')
                    ->first();
        
        if ($flag->id) {
            
            $log = new Logger('prcSys_Insert_Call_LogsLogs');
            $log->pushHandler(new StreamHandler('storage/logs/prcSys_Insert_Call_Logs.log', Logger::INFO));
            
            $StartTime = DB::Select('SELECT CONVERT(datetime,  GETDATE()) as Fecha');
            
            $upTable = DB::table('DailyProcess')->Insert(
                           ['Name'   => 'prcSys_Insert_Call_Logs',
                            'sysout' => 0,
                            'StartTime'  => $StartTime[0]->Fecha,
                            'EndTime'    => $StartTime[0]->Fecha
                            ]
                        );
        
            $prcSys = DB::Select('SET NOCOUNT ON exec prcSys_Insert_Call_Logs');
        
            $log->addInfo("Cron prcSys_Insert_Call_Logs Executed");
            $this->info('Cron prcSys_Insert_Call_Logs execute correctly');
            

            
        }
    }
}

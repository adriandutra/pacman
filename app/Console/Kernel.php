<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel 
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\prcSys_Insert_CRM::class,
        Commands\prcSys_Insert_Campaign::class,
        Commands\prcSys_Insert_CRM_Users::class,
        Commands\prcSys_Insert_Contacts::class,
        Commands\prcSys_Insert_External_Contact::class,
        Commands\prcSys_Insert_External_Database::class,
        Commands\prcSys_Insert_Logins::class,
        Commands\prcSys_Insert_Call_Logs::class,
        Commands\prcSys_Insert_Contact_Sale::class,
        Commands\prcSys_Insert_Contact_History::class,
        Commands\prcSys_Insert_Contact_Phone::class,
        Commands\prcSys_Insert_Contact_Address::class,
        Commands\prcSys_Insert_Contact_MailAddress::class,
        Commands\prcSys_Insert_Traffic_GW::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->command('job:prcSys_Insert_CRM')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires') 
                 ->dailyAt('19:30');
        
        $schedule->command('job:prcSys_Insert_Campaign')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyMinute()
                 ->between('19:40','20:00');
        
        $schedule->command('job:prcSys_Insert_CRM_Users')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyMinute()
                 ->between('20:01','20:20');
        
        $schedule->command('job:prcSys_Insert_Contacts')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('20:21','20:35');
        
        $schedule->command('job:prcSys_Insert_External_Database')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('20:36','21:45');
                 
        $schedule->command('job:prcSys_Insert_External_Contact')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('21:45','22:00');
        
        
        $schedule->command('job:prcSys_Insert_Logins')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyMinute()
                 ->between('20:30','21:00');
        
            
        $schedule->command('job:prcSys_Insert_Call_Logs')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('21:00','21:40');
        
        $schedule->command('job:prcSys_Insert_Contact_Sale')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('21:30','22:00');
        
                 
        $schedule->command('job:prcSys_Insert_Contact_History')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('22:00','22:40');
        
                 
        $schedule->command('job:prcSys_Insert_Contact_Phone')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('22:20','23:00');
      
                 
        $schedule->command('job:prcSys_Insert_Contact_Address')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('23:10','23:59');
        
                 
        $schedule->command('job:prcSys_Insert_Contact_MailAddress')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('23:30','23:59'); 
          
     }

} 

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
                 ->dailyAt('01:00');
        
        $schedule->command('job:prcSys_Insert_Campaign')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyMinute()
                 ->between('01:00','01:05');
        
        $schedule->command('job:prcSys_Insert_CRM_Users')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyMinute()
                 ->between('01:05','01:10');
        
        $schedule->command('job:prcSys_Insert_Contacts')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('01:10','01:30');
        
        $schedule->command('job:prcSys_Insert_External_Contact')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('01:30','02:00');
        
        $schedule->command('job:prcSys_Insert_External_Database')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('01:30','02:00');
      
        $schedule->command('job:prcSys_Insert_Logins')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyMinute()
                 ->between('02:00','02:10');

        $schedule->command('job:prcSys_Insert_Call_Logs')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('02:10','02:30');
        
        
        $schedule->command('job:prcSys_Insert_Contact_Sale')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('02:30','02:50');
        
        
        $schedule->command('job:prcSys_Insert_Contact_History')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('02:50','03:10');
      
                 
        $schedule->command('job:prcSys_Insert_Contact_Address')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('02:30','02:50');
        
                 
        $schedule->command('job:prcSys_Insert_Contact_MailAddress')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('02:50','03:10');
        
                 
        $schedule->command('job:prcSys_Insert_Contact_Phone')
                 ->withoutOverlapping()
                 ->timezone('America/Argentina/Buenos_Aires')
                 ->everyTenMinutes()
                 ->between('03:10','03:30'); 

     }

}

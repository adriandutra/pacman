<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Queue\Jobs\Job;

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
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}

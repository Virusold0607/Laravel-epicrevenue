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
        Commands\MailChimpSync::class,
        Commands\MailChimpClean::class,
        Commands\SettleUserBalances::class,
        Commands\SettleTaxDetails::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        ->sendOutputTo($filePath)
//        ->emailOutputTo('abdullahnaseer999@gmail.com')

        $schedule->command('mailchimp:sync')->daily();
        $schedule->command('mailchimp:clean')->weekly();
        $schedule->command('settle:balances')->daily();
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

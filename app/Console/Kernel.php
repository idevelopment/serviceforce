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
        Commands\ForgeServers::class,
        Commands\OperatingSystems::class,
    //    Commands\PayAsYouGo::class,
        Commands\ProvisionServers::class,
        Commands\CheckServerInstall::class,
        Commands\PayAsYouGoData::class,


    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
        $schedule->command('backup:monitor')->daily()->at('03:00');
//        $schedule->command('provision:servers')->everyMinute()->withoutOverlapping();
//        $schedule->command('check:install')->everyFiveMinutes()->withoutOverlapping();
    }
}

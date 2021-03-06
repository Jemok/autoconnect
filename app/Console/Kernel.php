<?php

namespace App\Console;

use App\Console\Commands\AddAreasCommand;
use App\Console\Commands\AdminCommand;
use App\Console\Commands\AppInitializer;
use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\RolesCommand;
use App\Console\Commands\StopAdsCommand;
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
        AppInitializer::class,
        RolesCommand::class,
        AdminCommand::class,
        AddAreasCommand::class,
        GenerateSitemap::class,
        StopAdsCommand::class
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
        $schedule->command('ads:stop')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

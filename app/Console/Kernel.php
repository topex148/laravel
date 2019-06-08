<?php

namespace App\Console;

use DB;
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

        'App\Console\Commands\PauseUsers',
        'App\Console\Commands\PausePrestadores',

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // protected function schedule(Schedule $schedule)
     //{
      //   $schedule->call(function () {
        //     DB::table('publicidades')->delete();
        // })->everyMinute();
     //}

     protected function schedule(Schedule $schedule)
     {
       $schedule->command('pause:users')->hourly();
       $schedule->command('pause:prestadores')->hourly();
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

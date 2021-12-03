<?php

namespace App\Console;

use Aws\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\CheckTimeOutEdit;
use App\Models\Event;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\InactiveUser::class,
        Commands\NotReadPost::class,
        Commands\CheckTimeEditEvent::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->call('\App\Http\Controllers\Api\EventController@maintain')->everyMinute();
        // $schedule->job(new CheckTimeOutEdit)
        //     ->everyMinute();
        // $schedule->command('event:time')
        //     ->everyMinute();
        $schedule->command('user:inactive')
            ->daily();
        $schedule->command('post:notread')
            ->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

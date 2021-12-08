<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
	    $schedule
		    ->command('test:foreground')
		    ->withoutOverlapping()
		    ->everyMinute();
	
	    $schedule
		    ->command('test:background')
		    ->runInBackground()
		    ->withoutOverlapping()
		    ->everyMinute();
	
	    $schedule
		    ->call(function() {
			    sleep(10);
			    Log::info('Closure ran.');
		    })
		    ->name('Scheduled closure')
		    ->withoutOverlapping()
		    ->everyMinute();
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

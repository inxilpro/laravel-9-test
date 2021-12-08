<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ForegroundCommand extends Command
{
	protected $signature = 'test:foreground';
	
	public function handle()
	{
		sleep(10);
		
		Log::info('Foreground job ran');
	}
}

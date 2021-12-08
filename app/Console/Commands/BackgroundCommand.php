<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BackgroundCommand extends Command
{
	protected $signature = 'test:background';
	
	public function handle()
	{
		sleep(10);
		
		Log::info('Background job ran');
	}
}

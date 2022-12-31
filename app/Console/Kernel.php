<?php

namespace App\Console;

use App\Console\Commands\SendContact;
use App\Console\Commands\UpdateInventory;
use App\Http\Controllers\InventoryController;
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
  // protected $commands = [
  //   'App\Console\Commands\SendContact',
  //   'App\Console\Commands\UpdateInventory'
  // ];

  protected function schedule(Schedule $schedule)
  {
    $schedule->command("update:inventory")->hourly();
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

<?php

namespace App\Console;

use App\Http\Controllers\InventoryController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
    // $schedule->command('inspire')->hourly();

    $schedule->command("update:inventory")->hourlyAt(15)->emailOutputTo('kris@debuggingbytes.com');
    $schedule->command("send:contact")->everyMinute()->emailOutputTo('kris@debuggingbytes.com');
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

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
  protected $commands = [
    Commands\SendContact::class,
    Commands\UpdateInventory::class
  ];

  protected function schedule(Schedule $schedule)
  {
    // $schedule->command('inspire')->hourly();

    // $schedule->command("update:inventory")->twiceDaily();
    // $schedule->command("send:contact")->everyMinute();
    $schedule->call(function () {
      Log::info("Begin Emails");
      app()->call('App\Http\Controllers\EmailController@processUnsentEmails');
      Log::info("Processed emails");
    })->everyMinute();

    $schedule->call(function () {
      Log::info("Updating Inventory..");
      app()->call('App\Http\Controllers\PartController@updateDatabase');
      Log::info("Updated Parts..");

      app()->call('App\Http\Controllers\InventoryController@updateDatabase');
      Log::info("Updated Crane Inventory..");

      app()->call('App\Http\Controllers\NonCraneController@updateDatabase');
      Log::info("Updated Non-Crane Inventory..");
    })->everySixHours();
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

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateInventory extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'update:inventory';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Update Parts & Equipment inventory';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    app()->call('App\Http\Controllers\PartController@updateDatabase');
    app()->call('App\Http\Controllers\InventoryController@updateDatabase');
  }
}

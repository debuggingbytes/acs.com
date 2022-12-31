<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PartController;
use App\Mail\ContactForm;
use App\Models\Curl;
use App\Models\Email;
use App\Models\inventory;
use App\Models\NonCrane;
use App\Models\Part;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', function () {
  $craneData = inventory::all();
  return view('home', ['cranes' => $craneData]);
})->name('home');

// All routes based around inventory

Route::prefix('inventory')->group(function () {

  Route::get('/', [InventoryController::class, 'showInventory'])->name('inventory');
  Route::get('/category/{slug}', [InventoryController::class, 'showCategory'])->name('category');

  Route::get('/parts', function () {
    $inventory = Part::all();
    $cranes = inventory::inRandomOrder()->limit(5)->get();
    return view('parts-inventory', ['inventory' => $inventory, 'cranes' => $cranes]);
  })->name('crane-parts');

  Route::get('/parts/{id}/{slug}', function ($id) {
    $crane = Part::find($id);
    $cranes = inventory::inRandomOrder()->limit(5)->get();
    $next = Part::where('id', '>', $id)->first();
    if (!$next) {
      $next = "end of parts inventory";
    }
    $prev = Part::where('id', '<', $id)->first();
    // dd($prev);
    if (!$prev) {
      $prev = "Start of parts inventory";
    }

    if ($crane === null) {
      $inventory = inventory::all();
      $parts = Part::all();
      return view('inventory', ['inventory' => $inventory, 'cranes' => $cranes, 'parts' => $parts]);
    }

    return view('parts', ['crane' => $crane, 'cranes' => $cranes, 'next' => $next, 'prev' => $prev]);
  })->name('parts');


  Route::get('/crane/{id}/{slug}/', function ($id) {
    $crane = inventory::find($id);
    $cranes = inventory::inRandomOrder()->limit(5)->get();
    $next = inventory::where('id', '>', $id)->first();
    if (!$next) {
      $next = "end of inventory";
    }
    $prev = inventory::where('id', '<', $id)->first();
    // dd($prev);
    if (!$prev) {
      $prev = "Start of inventory";
    }

    if ($crane === null) {
      $inventory = inventory::all();
      return view('inventory', ['inventory' => $inventory, 'cranes' => $cranes]);
    }

    return view('crane', ['crane' => $crane, 'cranes' => $cranes, 'next' => $next, 'prev' => $prev]);
  })->name('crane');

  // Non Crane / Heavy Equipment routes
  //  Routes will include a base search of "Heavy-Equipment"
  //  Route will also include a category and slug of "Heavy-equipment"

  Route::get('/heavy-equipment', function () {
    $inventory = NonCrane::all();
    $cranes = inventory::inRandomOrder()->limit(5)->get();

    return view('noncrane-inventory', ['inventory' => $inventory, 'cranes' => $cranes]);
  })->name('heavy-equipment');

  // View Equipment Route
  Route::get('/heavy-equipment/{id}/{slug}', function (INT $id) {
    $nonCrane = NonCrane::find($id);
    $cranes = inventory::inRandomOrder()->limit(5)->get();
    $next = inventory::where('id', '>', $id)->first();
    if (!$next) {
      $next = "end of inventory";
    }
    $prev = inventory::where('id', '<', $id)->first();
    // dd($prev);
    if (!$prev) {
      $prev = "Start of inventory";
    }

    if ($nonCrane === null) {
      $inventory = NonCrane::all();
      return view('noncrane-inventory', ['inventory' => $inventory, 'cranes' => $cranes]);
    }

    return view('non-crane', ['nonCrane' => $nonCrane, 'cranes' => $cranes, 'next' => $next, 'prev' => $prev]);
  })->name('heavy-equip-view');
});


// Contact route

Route::get('/contact-us', function () {
  $cranes = inventory::inRandomOrder()->limit(5)->get();

  return view('contact', ['cranes' => $cranes]);
})->name('contact');

// Financing Route

Route::get('/finance', function () {
  $cranes = inventory::inRandomOrder()->limit(5)->get();
  return view('finance', ['cranes' => $cranes]);
})->name('finance');


Route::get('/dev/update', function () {
  echo "<h2>Current Status</h2>";
  echo "<h3>Sending Emails</h3>";
  app()->call('App\Http\Controllers\EmailController@processUnsentEmails');
  echo "<h3>Emails sent...</h3>";
  echo "<h3>Updating inventories ...</h3>";
  app()->call('App\Http\Controllers\PartController@updateDatabase');
  app()->call('App\Http\Controllers\InventoryController@updateDatabase');
  app()->call('App\Http\Controllers\NonCraneController@updateDatabase');
  echo "<h3>inventories updated...</h3>";


  // return "Success..";
});

Route::get('/test', function () {

  $response = Http::post(env("CN_API_CRANE"));

  // echo "<h2>STATUS</h2>";
  // echo $response->status();
  // echo "<br><h2>BODY</h2>";
  // echo $response->json();
  // echo "<br><h2>SUCCESSFUL</h2>";
  // echo $response->successful();
  // echo "<br>";
  dd(json_decode($response->body()));
});


//  ADMIN DASHBOARD
Route::middleware('auth:sanctum')->group(function () {
  Route::prefix('/dashboard')->group(function () {

    Route::get('/', function () {
      return view('dashboard.index');
    });
  });
});

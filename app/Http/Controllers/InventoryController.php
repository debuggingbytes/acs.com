<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\Part;
use Illuminate\Support\Str;


class InventoryController extends Controller
{
  // Grab latest cranes from CN API
  public function craneInventory($array = false)
  {

    // header('Content-Type: application/json');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_FAILONERROR, true);
    curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, env('CN_API_DATA'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_TIMEOUT, 5);
    curl_setopt($curl, CURLOPT_URL, env('CN_API_CRANE'));
    curl_setopt($curl, CURLOPT_VERBOSE, true);

    // dd($curl);
    $http_result = curl_exec($curl);
    curl_close($curl);


    if ($array === true) {
      $cranes = json_decode($http_result, true);
      return $cranes;
    }
    return response($http_result)->header('Content-Type', 'application/json');
  }

  // Grab latest Parts from Crane network
  public static function partsInventory($array = false)
  {

    // header('Content-Type: application/json');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_FAILONERROR, true);
    curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, env('CN_API_DATA'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_TIMEOUT, 5);
    curl_setopt($curl, CURLOPT_URL, env('CN_API_PARTS'));
    curl_setopt($curl, CURLOPT_VERBOSE, true);

    // dd($curl);
    $http_result = curl_exec($curl);
    curl_close($curl);


    if ($array === true) {
      $equipment = json_decode($http_result, true);
      return $equipment;
    }
    return response($http_result)->header('Content-Type', 'application/json');
  }


  public function showInventory()
  {
    $inventory = inventory::all();
    $parts = Part::all();
    $cranes = inventory::inRandomOrder()->limit(5)->get();
    return view('inventory', ['inventory' => $inventory, 'cranes' => $cranes, 'parts' => $parts]);
  }

  public function showCategory($category)
  {
    $category = Str::replace('-', ' ', $category);
    if (Str::contains($category, 'luffing')) {
      $category = Str::replace('luffing', '(Luffing)', $category);
      $inventory = Part::where('category', '=', $category)->get();
    } else {
      $inventory = inventory::where('category', '=', $category)->get();
    }
    $cranes = inventory::inRandomOrder()->limit(5)->get();

    if ($inventory->isEmpty()) {
      $inventory = $category;
      return view('no-category', ['inventory' => $inventory, 'randomCrane' => $cranes[0], 'cranes' => $cranes]);
    }

    return view('category', ['inventory' => $inventory, 'cranes' => $cranes]);

    // return $category;
  }

  public function updateDatabase()
  {
    echo "Calling Truncate \n";
    inventory::query()->truncate();
    echo "truncated..\n";

    $datas = $this->craneInventory(true);
    echo "calling API \n";

    foreach ($datas as $data) {
      $slug = $data['year'] . " " . $data['make'] . " " . $data['model'];
      $inventory = inventory::create([
        'slugName' => Str::slug($slug, '-'),
        'category' => $data['category'],
        'make' => $data['make'],
        'model' => $data['model'],
        'hours' => $data['hours'],
        'condition' => $data['condition'],
        'subject' => $data['subject'],
        'year' => $data['year'],
        'capacity' => $data['capacity'],
        'boom' => $data['boom'],
        'jib' => $data['jib'],
        'description' => $data['description'],
        'images' => json_encode($data['images']),
      ]);
      $inventory->save();
    }
  }


  public function showCrane($id)
  {
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use Illuminate\Support\Str;

class PartController extends Controller
{
  public function updateDatabase()
  {

    Part::query()->truncate();
    echo "truncated..\n";

    $datas = $this->partsInventory(true);
    echo "calling API \n";

    foreach ($datas as $data) {
      // $slug = $data['make'] . "-" . Str::remove(['(', ')'], Str::replace(' ', '-', $data['category']));
      $slug = $data['make'] . " " . $data['category'];
      // $slug = Str::slug($data)
      $inventory = Part::create([
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
      $cranes = json_decode($http_result, true);
      return $cranes;
    }
    return response($http_result)->header('Content-Type', 'application/json');
  }
}

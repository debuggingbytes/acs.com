<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
  use HasFactory;

  protected $fillable = ['slugName', 'category', 'make', 'model', 'subject', 'year', 'capacity', 'boom', 'jib', 'images', 'description', 'hours', 'condition'];
  // public $timestamps = false;

  public function getCleanDescriptionAttribute()
  {
    return strip_tags($this->description, '<br>');
  }

  // Grab latest cranes from CN API
  public function craneInventory()
  {
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

    $http_result = curl_exec($curl);
    dd($http_result);
    curl_close($curl);

    print $http_result;
  }
}

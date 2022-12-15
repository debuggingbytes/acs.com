<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonCrane extends Model
{
  use HasFactory;

  protected $fillable = ['slugName', 'category', 'make', 'model', 'subject', 'year', 'images', 'description', 'hours', 'condition'];
}

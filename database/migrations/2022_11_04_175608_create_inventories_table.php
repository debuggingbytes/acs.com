<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('inventories', function (Blueprint $table) {
      $table->id()->unique();
      $table->timestamps();
      $table->string('slugName')->nullable();
      // Only grab what data we need form crane network API
      $table->string('category')->nullable();
      $table->string('make')->nullable();
      $table->string('model')->nullable();
      $table->string('subject')->nullable();
      $table->string('year');
      $table->string('capacity')->nullable();
      $table->string('boom')->nullable();
      $table->string('jib')->nullable();
      $table->string('hours')->nullable();
      $table->string('condition')->nullable();
      $table->text('description')->nullable();
      $table->json('images')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('inventories');
  }
}

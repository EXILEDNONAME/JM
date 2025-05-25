<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('main_users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('col_1')->nullable();
      $table->string('col_2')->nullable();
      $table->string('col_3')->nullable();
      $table->string('col_4')->nullable();
      $table->string('col_5')->nullable();
      $table->string('col_6')->nullable();
      $table->string('col_7')->nullable();
      $table->string('col_8')->nullable();
      $table->string('col_9')->nullable();
      $table->string('col_10')->nullable();
      $table->string('col_11')->nullable();
      $table->string('col_12')->nullable();
      $table->string('col_13')->nullable();
      $table->string('col_14')->nullable();
      $table->string('col_15')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('main_users');
  }

};

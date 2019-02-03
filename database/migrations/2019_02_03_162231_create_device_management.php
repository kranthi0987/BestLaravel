<?php
/**
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_management', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_model', 250);
            $table->string('device_resolution');
            $table->string('device_id');
            $table->string('registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_management');
    }
}

<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->primary;
            $table->integer('address_id')->references('address_id')->on('addresses');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_phone_number');
            $table->string('user_avatar');
            $table->boolean('active')->default(false);
            $table->string('activation_token');
            $table->string('user_other_details');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
//        Schema::table('users', function($table) {
//            $table->foreign('address_id')->references('address_id')->on('addresses');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            'addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id')->primary;
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('state');
            $table->string('country');
            $table->string('others');
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
        Schema::dropIfExists('addresses');
    }
}

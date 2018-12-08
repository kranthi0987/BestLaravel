<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            'products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company');
            $table->longText('description');
            $table->float('amount');
            $table->string('category')->nullable();
            $table->boolean('available');
            $table->string('productimg');
            $table->timestamps();
//            $table->softDeletes();
//            $table->foreign('category')
//                ->references('id')->on('product_category')
//                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

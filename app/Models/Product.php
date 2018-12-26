<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(ProductCategory::class); // don't forget to add your full namespace
    }
}

<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    public $table = "product_category";
    protected $fillable = ['product_category_name', 'product_category_description'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}

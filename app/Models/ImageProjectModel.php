<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProjectModel extends Model
{
    //
    public $table = "image_project";
    protected $fillable = ['name', 'imageurl'];
}

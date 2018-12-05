<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

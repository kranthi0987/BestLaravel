<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    //
    protected $fillable = [
        'email', 'token'
    ];
}

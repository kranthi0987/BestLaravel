<?php
/**
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    //
    public $table = "device_management";

    protected $fillable = [
        'device_model', 'device_resolution', 'device_id', 'registered'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
      'brand', 'license', 'color', 'driver_name', 'driver_sex', 'driver_tel'
    ];
}

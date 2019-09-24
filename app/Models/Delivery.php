<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'car_id', 'guest_id', 'start_time', 'back_time'
    ];
}

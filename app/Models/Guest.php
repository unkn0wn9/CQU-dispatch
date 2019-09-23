<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
      'company', 'level', 'retinues', 'arrive_datetime', 'leave_datetime', 'arrive_flight', 'leave_flight', 'hotel'
    ];
}

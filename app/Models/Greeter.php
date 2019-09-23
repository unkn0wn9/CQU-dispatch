<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Greeter extends Model
{
    protected $fillable = [
        'number', 'name', 'sex', 'company', 'tel'
    ];
}

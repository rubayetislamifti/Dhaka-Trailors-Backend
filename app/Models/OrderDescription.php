<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDescription extends Model
{
    protected $fillable = [
        'order_id',
        'cloth','mojuri',

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowerMeasurement extends Model
{
    protected $fillable = [
        'order_id',
        'length2',
        'body2',
        'west',
        'hi',
        'run',
        'back_pocket',
        'front_mobile_pocket',
        'right_pocket_chain',
        'double_pocket_chain'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'order_date',
        'delivery_date',
        'status',
        'name',
        'phone',
        'address',
        'receiver_name',
        'total',
        'advance',
        'due'
    ];
}

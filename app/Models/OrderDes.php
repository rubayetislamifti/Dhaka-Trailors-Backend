<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDes extends Model
{
    protected $fillable = [
        'order_id','order_description','quantity','price','total_price'
    ];

    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}

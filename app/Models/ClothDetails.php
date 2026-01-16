<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClothDetails extends Model
{
    protected $fillable = [
        'order_id',
        'little_punjabi',
        'kalidar_punjabi',
        'madani_punjabi',
        'little_robe',
        'arabian_robe',
        'kabli',
        'fatwa',
        'salwar',
        'pajama_cutting'
    ];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClothFeature extends Model
{
    protected $fillable = [
        'order_id',
        'sherwani_collar',
        'brand_collar',
        'shirt_collar',
        'chest_pocket',
        'chest_pocket_sticker',
        'chain_pocket',
        'bottom_no',
        'isnaf_bottom_no',
        'metal_bottom_no',
        'cuffs',
        'coughlin_sleeves',
        'black_color',
        'tira'
    ];
}

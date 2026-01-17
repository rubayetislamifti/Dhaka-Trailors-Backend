<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpperMeasurement extends Model
{
    protected $fillable = [
        'order_id','length','body','belly','tira2','sleeves','hem','neck','chest_open','chest_loose','belly_loose','lower_enclouser'
    ];
}

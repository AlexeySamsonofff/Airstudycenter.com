<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodationimage extends Model
{
     protected $fillable = [
        'accommodation_id', 'image',
    ];
}

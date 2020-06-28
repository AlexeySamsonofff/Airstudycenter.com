<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodationtype extends Model
{
     protected $fillable = [
        'accommodation_id', 'type_id',
    ];
}

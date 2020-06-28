<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favaccommodation extends Model
{
    //
    protected $table = 'favaccommodations';
    protected $fillable = [
        'userid', 'accommodationid'
    ];
}

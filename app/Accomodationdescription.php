<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomodationdescription extends Model
{
    //
    protected $fillable = [
        'accommodation_id', 'bedroom','kitchen','balcony','bathroom'
    ];
}

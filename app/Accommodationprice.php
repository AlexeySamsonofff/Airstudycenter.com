<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodationprice extends Model
{
    //
     protected $fillable = [
        'accommodation_id', 'acc_type','typeid','price','pricewith','available'
    ];
}

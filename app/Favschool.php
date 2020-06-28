<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favschool extends Model
{
    //
    protected $table = 'favschools';
    protected $fillable = [
        'userid', 'schoolid'
    ];
}

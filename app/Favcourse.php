<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favcourse extends Model
{
    //
    protected $table = 'favcourses';
    protected $fillable = [
        'userid', 'coursePid'
    ];
}

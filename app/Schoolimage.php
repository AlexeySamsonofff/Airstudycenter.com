<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolimage extends Model
{
    protected $fillable = [
        'schoolId', 'image',
    ];
}

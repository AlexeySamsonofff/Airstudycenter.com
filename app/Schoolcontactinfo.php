<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolcontactinfo extends Model
{
    protected $fillable = [
        'schoolId', 'contactInfo',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolhistory extends Model
{
    protected $fillable = [
        'school_id', 'country_id', 'no_of_student'
    ];
}

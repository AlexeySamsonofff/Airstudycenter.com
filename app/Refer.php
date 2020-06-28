<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    //
    protected $table = 'referrals';
    protected $fillable = [
        'sendinguserid', 'newuserid'
    ];
}

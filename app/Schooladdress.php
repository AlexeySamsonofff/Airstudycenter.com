<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schooladdress extends Model
{
    protected $fillable = [
        'schoolId','countryId','stateId','cityId','zipCodeId','address',
    ];

    public function schools()
    {
    	return $this->belongsTo('App\School', 'schoolId');
    }
}

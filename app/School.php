<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function schoolfacilities()
    {
    	return $this->hasMany('App\Schoolfacilities');
    }

    public function courses()
    {
    	return $this->hasMany('App\Courseprice', 'schoolId');
    }

    public function reviews()
    {
    	return $this->hasMany('App\Schoolreview', 'school_id','schoolId');
    }
}

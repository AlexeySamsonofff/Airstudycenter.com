<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function state()
    {
    	return $this->belongsTo('App\State');
    }

    public function zipcode()
    {
    	return $this->hasMany('App\Zipcode');
    }
	
	public function property()
    {
    	return $this->hasMany('App\Property');
    }
}

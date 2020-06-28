<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

	 protected $fillable = [
        'name'
    ];

    public function states()
    {
    	return $this->hasMany('App\State');
    }
	
	public function property()
    {
    	return $this->hasMany('App\Property');
    }
}

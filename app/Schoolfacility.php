<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolfacility extends Model

{
    protected $table="school_facilities";
    protected $fillable = ['school_id','facility_id'];

    public function school()
    {
    	return $this->belongsTo('App\School');
    }

    
}

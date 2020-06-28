<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courseprice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courseprices';

    // public function coursePrices()
    // {
    // 	return $this->belongsTo('App\School');
    // }

    public function courseTitles(){
        return $this->hasOne('App\Coursetitle', 'id','courseId');
    }
}

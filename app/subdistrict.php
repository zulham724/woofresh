<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subdistrict extends Model
{
    protected $guarded = ["id"];

     public function city(){
    	return $this->belongsTo('App\City');
    }
}

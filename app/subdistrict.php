<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
	//Subdistrict
    protected $guarded = ["id"];

     public function city(){
    	return $this->belongsTo('App\City');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ["id"];

    public function products(){
    	return $this->hasMany('App\Product');
    }

    public function state(){
    	return $this->belongsTo('App\State');
    }

    public function subdistricts(){
    	return $this->hasMany('App\Subdistrict');
    }
}

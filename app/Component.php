<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = ["id"];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
    public function component_list(){
    	return $this->belongsTo('App\ComponentList');
    }

    public function component_values(){
    	return $this->hasMany('App\ComponentValue');
    }

}

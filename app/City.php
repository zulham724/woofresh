<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ["id"];

    public function products(){
    	return $this->hasMany('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = ["id"];

    public function recipe(){
    	return $this->belongsTo('App\Recipe');
    }

    public function product(){
    	return $this->hasOne('App\Product');
    }
}

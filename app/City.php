<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ["id"];

    public function suppliers(){
    	return $this->hasMany('App\Supplier');
    }
}

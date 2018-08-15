<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentValue extends Model
{
    protected $guarded = ["id"];

    public function component(){
    	return $this->belongsTo('App\Component');
    }
}

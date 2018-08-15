<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = ["id"];

    public function categories(){
    	return $this->hasMany('App\Category');
    }

    public function group_translations(){
    	return $this->hasMany('App\GroupTranslation');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $guarded = ["id"];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function language(){
    	return $this->hasOne('App\Language');
    }
}

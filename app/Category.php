<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ["id"];

    public function group(){
    	return $this->belongsTo('App\Group');
    }

    public function sub_categories(){
    	return $this->hasMany('App\SubCategory');
    }

    public function category_translations(){
    	return $this->hasMany('App\CategoryTranslation');
    }
}

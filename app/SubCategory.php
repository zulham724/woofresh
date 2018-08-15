<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = ["id"];

    public function products(){
    	return $this->hasMany('App\Product');
    }

    public function sub_category_translations(){
    	return $this->hasMany('App\SubCategoryTranslation');
    }
}

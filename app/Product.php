<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ["id"];

    public function supplier(){
    	return $this->belongsTo('App\Supplier');
    }

    public function sub_category(){
        return $this->belongsTo('App\SubCategory');
    }

    public function language(){
    	return $this->hasOne('App\Language');
    }

    public function product_translations(){
    	return $this->hasMany('App\ProductTranslation');
    }
}

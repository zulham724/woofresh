<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ["id"];

    public function supplier(){
    	return $this->belongsTo('App\Supplier');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function sub_category(){
        return $this->belongsTo('App\SubCategory');
    }


    public function product_translations(){
    	return $this->hasMany('App\ProductTranslation');
    }
}

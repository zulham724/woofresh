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
     public function category(){
        return $this->belongsTo('App\Category');
    }
    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function product_sales(){
        return $this->hasMany('App\ProductSale');
    }

    public function components(){
        return $this->hasMany('App\Component');
    }

    public function product_images(){
        return $this->hasMany('App\ProductImage');
    }

    public function product_ratings(){
        return $this->hasMany('App\ProductRating');
    }
}

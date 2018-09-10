<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
     protected $guarded = ["id"];
     public function product(){
    	return $this->belongsTo('App\Product');
    }
    public function state(){
    	return $this->belongsTo('App\State');
    }
     public function city(){
    	return $this->belongsTo('App\City');
    }
     public function subdistrict(){
    	return $this->belongsTo('App\Subdistrict');
    }
}

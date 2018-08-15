<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $guarded = ["id"];

    public function product(){
    	return $this->belongsTo('App\Product');
    }

    public function language(){
    	return $this->hasOne('App\Language');
    }
}

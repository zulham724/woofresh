<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryTranslation extends Model
{
    protected $guarded = ["id"];

    public function sub_category(){
    	return $this->belongsTo('App\SubCategory');
    }

    public function language(){
    	return $this->belongsTo('App\Language');
    }
}

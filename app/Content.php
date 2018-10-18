<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = ["id"];

    public function content_translations(){
    	return $this->hasMany('App\ContentTranslation');
    }

    public function content_list(){
    	return $this->belongsTo('App\ContentList');
    }
}

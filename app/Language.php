<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = ["id"];

    public function content_translations(){
    	return $this->hasMany('App\ContentTranslation');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentTranslation extends Model
{
    protected $guarded = ["id"];

    public function language(){
    	return $this->belongsTo('App\Language');
    }
}

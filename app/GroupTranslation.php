<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupTranslation extends Model
{
    protected $guarded = ["id"];

    public function group(){
    	return $this->belongsTo('App\Group');
    }

    public function language(){
    	return $this->hasOne('App\Language');
    }
}

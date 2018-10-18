<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentList extends Model
{
    protected $guarded = ["id"];

    public function contents(){
    	return $this->hasMany('App\Content');
    }
}

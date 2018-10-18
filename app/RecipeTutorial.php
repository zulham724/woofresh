<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeTutorial extends Model
{
	protected $guarded = ["id"];
	
    public function recipe(){
    	return $this->belongsTo('App\Recipe');
    }
}

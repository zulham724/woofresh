<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeTutorial extends Model
{
    public function recipe(){
    	return $this->belongsTo('App\Recipe');
    }
}

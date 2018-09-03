<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = ["id"];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function recipe_comments(){
    	return $this->hasMany('App\RecipeComment');
    }

    public function ingredients(){
    	return $this->hasMany('App\Ingredient');
    }
}

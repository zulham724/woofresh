<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentList extends Model
{
    protected $guarded = ['id'];

    public function product(){
    	return $this->belongsTo('App\Product');	
 }
  public function component_list(){
    	return $this->belongsTo('App\Component_list');
    }
}

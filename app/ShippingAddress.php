<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
	protected $guarded = ["id"];
    public function transaction(){
    	return $this->belongsTo('App\Transaction');
    }
}

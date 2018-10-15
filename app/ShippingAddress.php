<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    public function transaction(){
    	return $this->belongsTo('App\Transaction');
    }
}

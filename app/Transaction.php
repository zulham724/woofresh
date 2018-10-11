<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ["id"];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function orders(){
    	return $this->hasMany('App\Order');
    }

    public function voucher(){
    	return $this->hasOne('App\Voucher');
    }

    public function shipping_address(){
    	return $this->hasOne('App\ShippingAddress');
    }

    public function delivery_fee(){
    	return $this->belongsTo('App\DeliveryFee');
    }

}

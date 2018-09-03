<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ["id"];

    public function transaction(){
    	return $this->belongsTo('App\Transaction');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}

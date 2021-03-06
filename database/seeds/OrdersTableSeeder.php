<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   		$data = [
		    [
		    	"id"=>1,
		    	"transaction_id"=>1,
		    	"product_id"=>1,
        		"quantity"=>1,
        		"subtotal_price"=>1000
        	],

        	[
		    	"id"=>2,
		    	"transaction_id"=>2,
		    	"product_id"=>2,
        		"quantity"=>2,
        		"subtotal_price"=>2000
        	],
		];

        Order::insert($data);		
    }
}
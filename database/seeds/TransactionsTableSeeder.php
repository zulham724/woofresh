<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionsTableSeeder extends Seeder
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
		    	"user_id"=>1,
		    	"delivery_fee_id"=>1,
        		"transaction_number"=>1,
        		"payment_type"=>"oke",
        		"totalPrice"=>1000
        	],

        	[
		    	"id"=>2,
		    	"user_id"=>1,
		    	"delivery_fee_id"=>2,
        		"transaction_number"=>2,
        		"payment_type"=>"oke",
        		"totalPrice"=>2000
        	],
		];

        Transaction::insert($data);		
    }
}

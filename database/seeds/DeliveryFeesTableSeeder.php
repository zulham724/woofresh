<?php

use Illuminate\Database\Seeder;
use App\DeliveryFee;
class DeliveryFeesTableSeeder extends Seeder
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
        		"state_id"=>33,
        		"value"=>1,
        	],

        	[
		    	"id"=>2,
        		"state_id"=>33,
        		"value"=>2,
        	],
		];

        DeliveryFee::insert($data);		
    }
}

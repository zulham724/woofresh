<?php

use Illuminate\Database\Seeder;
use App\ProductSale;

class ProductSalesTableSeeder extends Seeder
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
		    	"product_id"=>1,
		    	"state_id"=>33,
		    	"city_id"=>3374,
		    	"subdistrict_id"=>3374020,
        		"stock"=>1,
        		"price"=>1000,
        		"discount"=>1,
        		"is_available"=>2,
        	],

        	[
		    	"id"=>2,
		    	"product_id"=>2,
		    	"state_id"=>33,
		    	"city_id"=>3374,
		    	"subdistrict_id"=>3374020,
        		"stock"=>2,
        		"price"=>2000,
        		"discount"=>2,
        		"is_available"=>3,
        	],
		];

        ProductSale::insert($data);		
    }
}
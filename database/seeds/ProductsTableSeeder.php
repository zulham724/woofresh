<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the ndatabase seeds.
     *
     * @return void
     */
    public function run()
    {
   		$data = [
		    [
		    	"id"=>1,
		    	"supplier_id"=>1,
		    	"group_id"=>1,
		    	"category_id"=>1,
		    	"sub_category_id"=>1,
        		"quantity"=>1,
        		"weight"=>1,
        		"unit"=>"ml",
        		"badge"=>null,
        	],

        	[
		    	"id"=>2,
		    	"supplier_id"=>2,
		    	"group_id"=>2,
		    	"category_id"=>2,
		    	"sub_category_id"=>2,
        		"quantity"=>2,
        		"weight"=>2,
        		"unit"=>"kg",
        		"badge"=>null,
        	],
		];

        Product::insert($data);		
    }
}

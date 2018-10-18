<?php

use Illuminate\Database\Seeder;
use App\Ingredient;

class IngredientsTableSeeder extends Seeder
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
		    	"recipe_id"=>1,
		    	"product_id"=>1,
		    	"optional_product"=>"oke",
        		"weight"=>"kg",
        		"unit"=>"kg",
        	],

        	[
		    	"id"=>2,
		    	"recipe_id"=>2,
		    	"product_id"=>2,
		    	"optional_product"=>"oke",
        		"weight"=>"kg",
        		"unit"=>"kg",
        	],
		];

        Ingredient::insert($data);		
    }
}
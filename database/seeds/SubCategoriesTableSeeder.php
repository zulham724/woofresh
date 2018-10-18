<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubCategoriesTableSeeder extends Seeder
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
		    	"category_id"=>1,
        		"name"=>"SAWI",
        		"image"=>"uploads/avatars/default.png"
        	],

        	[
		    	"id"=>2,
		    	"category_id"=>2,
        		"name"=>"Goreng",
        		"image"=>"uploads/avatars/default.png"
        	],
		];

        SubCategory::insert($data);		
    }
}

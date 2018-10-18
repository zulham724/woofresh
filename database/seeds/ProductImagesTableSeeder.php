<?php

use Illuminate\Database\Seeder;
use App\ProductImage;

class ProductImagesTableSeeder extends Seeder
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
        		"image"=>"uploads/avatars/default.png",
        		"description"=>"oke"
        	],

        	[
		    	"id"=>2,
		    	"product_id"=>2,
        		"image"=>"uploads/avatars/default.png",
        		"description"=>"oke"
        	],
		];

        ProductImage::insert($data);		
    }
}

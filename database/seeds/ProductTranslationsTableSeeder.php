<?php

use Illuminate\Database\Seeder;
use App\ProductTranslation;

class ProductTranslationsTableSeeder extends Seeder
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
		    	"language_id"=>1,
		    	"name"=>"idn",
		    	"description"=>"kosong",
        		"long_description"=>"kosong",
        		"key_information"=>"kosng",
        		"handling_and_delivery"=>"ml"
        	],

        	[
		    	"id"=>2,
		    	"product_id"=>2,
		    	"language_id"=>2,
		    	"name"=>"eng",
		    	"description"=>"kosong",
        		"long_description"=>"kosong",
        		"key_information"=>"kosng",
        		"handling_and_delivery"=>"ml",
        	],
		];

        ProductTranslation::insert($data);		
    }
}
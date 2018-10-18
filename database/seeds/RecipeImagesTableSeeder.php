<?php

use Illuminate\Database\Seeder;
use App\recipeimage;
class RecipeImagesTableSeeder extends Seeder
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
        		"image"=>"uploads/avatars/default.png",
        		"description"=>"oke"
        	],

        	[
		    	"id"=>2,
		    	"recipe_id"=>2,
        		"image"=>"uploads/avatars/default.png",
        		"description"=>"oke"
        	],
		];

        recipeimage::insert($data);		
    }
}
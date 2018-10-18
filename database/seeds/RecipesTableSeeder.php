<?php

use Illuminate\Database\Seeder;
use App\Recipe;

class RecipesTableSeeder extends Seeder
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
		    	"name"=>"minuman",
		    	"description"=>"oke",
		    	"tutorial"=>"oke",
        		"difficulty_level"=>1,
        		"preparation_time"=>1,
        		"portion_per_serve"=>1,
        	],

        	[
		    	"id"=>2,
		    	"user_id"=>1,
		    	"name"=>"makanan",
		    	"description"=>"oke",
		    	"tutorial"=>"oke",
        		"difficulty_level"=>1,
        		"preparation_time"=>1,
        		"portion_per_serve"=>1,
        	],
		];

        Recipe::insert($data);		
    }
}
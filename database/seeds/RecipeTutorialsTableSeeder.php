<?php

use Illuminate\Database\Seeder;
use App\RecipeTutorial;

class RecipeTutorialsTableSeeder extends Seeder
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
        		"name"=>"Minuman",
        		"description"=>"oke"
        	],

        	[
		    	"id"=>2,
		    	"recipe_id"=>2,
        		"name"=>"makanan",
        		"description"=>"oke"
        	],
		];

        RecipeTutorial::insert($data);		
    }
}
<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
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
		    	"group_id"=>1,
        		"name"=>"JUS",
        		"image"=>"uploads/avatars/default.png"
        	],

        	[
		    	"id"=>2,
		    	"group_id"=>2,
        		"name"=>"AYAM",
        		"image"=>"uploads/avatars/default.png"
        	],
		];

        Category::insert($data);		
    }
}

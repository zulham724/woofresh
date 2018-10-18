<?php

use Illuminate\Database\Seeder;
use App\Content;

class ContentsTableSeeder extends Seeder
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
		    	"name"=>"content A",
        		"image"=>"uploads/avatars/default.png",
        	],

        	[
		    	"id"=>2,
		    	"name"=>"content B",
        		"image"=>"uploads/avatars/default.png",
        	],
		];

        Content::insert($data);		
    }
}

<?php

use Illuminate\Database\Seeder;
use App\ContentTranslation;

class ContentTranslationsTableSeeder extends Seeder
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
		    	"content_id"=>1,
		    	"language_id"=>1,
        		"name"=>"conten",
        		"description"=>"oke"
        	],

        	[
		    	"id"=>2,
		    	"content_id"=>2,
		    	"language_id"=>2,
        		"name"=>"content",
        		"description"=>"oke"
        	],
		];

        ContentTranslation::insert($data);		
    }
}

<?php

use Illuminate\Database\Seeder;
use App\ContentList;

class ContentListsTableSeeder extends Seeder
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
        		"name"=>"Icon"
        	],[
        		"id"=>2,
        		"name"=>'Slider'
        	]
        ];

        ContentList::insert($data);
    }
}

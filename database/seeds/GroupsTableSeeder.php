<?php

use Illuminate\Database\Seeder;
use App\Group;
class GroupsTableSeeder extends Seeder
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
        		"name"=>"Minuman",
        		"image"=>"uploads/avatars/default.png"
        	],

        	[
		    	"id"=>2,
        		"name"=>"makanan",
        		"image"=>"uploads/avatars/default.png"
        	],
		];

        Group::insert($data);		
    }
}

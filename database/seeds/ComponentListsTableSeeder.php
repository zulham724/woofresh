<?php

use Illuminate\Database\Seeder;
use App\ComponentList;

class ComponentListsTableSeeder extends Seeder
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
        		"name"=>"Vitamin",
        		"description"=>"oke"
        	],

        	[
		    	"id"=>2,
        		"name"=>"Karbohidrat",
        		"description"=>"oke"
        	],
		];

        ComponentList::insert($data);		
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
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
        		"name"=>"admin",
        		"description"=>"Superadmin"
        	],
		    [
		    	"id"=>2,
        		"name"=>"customer",
        		"description"=>"Buyer"
        	],
		];

        Role::insert($data);		
    }
}

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
        		"role"=>"admin",
        		"description"=>"Superadmin"
        	],
		    [
		    	"id"=>2,
        		"role"=>"customer",
        		"description"=>"Buyer"
        	],
		];

        Role::insert($data);		
    }
}

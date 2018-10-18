<?php

use Illuminate\Database\Seeder;
use App\Biodata;

class BiodatasTableSeeder extends Seeder
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
		    	"state_id"=>33,
		    	"city_id"=>3374,
		    	"subdistrict_id"=>3374020,
        		"first_name"=>"agung",
        		"last_name"=>"megah",
        		"address"=>"alamat oke",
        		"phone_number"=>"089665349961",
        	],

        	[
		    	"id"=>2,
		    	"user_id"=>1,
		    	"state_id"=>33,
		    	"city_id"=>3374,
		    	"subdistrict_id"=>3374020,
        		"first_name"=>"agung",
        		"last_name"=>"megah",
        		"address"=>"alamat oke",
        		"phone_number"=>"089665349961",
        	],
		];

        Biodata::insert($data);		
    }
}
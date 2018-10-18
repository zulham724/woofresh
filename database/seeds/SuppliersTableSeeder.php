<?php

use Illuminate\Database\Seeder;
use App\Supplier;
class SuppliersTableSeeder extends Seeder
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
		    	"name"=>"supplier 1",
		    	"description"=>"oke",
		    	"contact_first_name"=>"depan",
		    	"contact_last_name"=>"belakang",
        		"contact_title"=>"oke",
        		"address_detail"=>"oke",
        		"email"=>"supplier@gmail.com",
        		"phone_number"=>"089665349961",
        	],

        	[
		    	"id"=>2,
		    	"name"=>"supplier 2",
		    	"description"=>"oke",
		    	"contact_first_name"=>"nama depan",
		    	"contact_last_name"=>"nama belakang",
        		"contact_title"=>"oke",
        		"address_detail"=>"oke",
        		"email"=>"supplier2@gmail.com",
        		"phone_number"=>"089665349962",
        	],
		];

        Supplier::insert($data);		
    }
}

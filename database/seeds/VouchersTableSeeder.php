<?php

use Illuminate\Database\Seeder;
use App\Voucher;

class VouchersTableSeeder extends Seeder
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
		    	"transaction_id"=>1,
		    	"name"=>"minuman",
        		"code"=>"AK0406",
        		"image"=>"uploads/avatars/default.png",
        		"description"=>"oke",
        		"value"=>1,
        		"percent"=>1

        	],

        	[
		    	"id"=>2,
		    	"transaction_id"=>2,
		    	"name"=>"minuman",
        		"code"=>"AK04034",
        		"image"=>"uploads/avatars/default.png",
        		"description"=>"oke",
        		"value"=>1,
        		"percent"=>1
        	],
		];

        Voucher::insert($data);		
    }
}
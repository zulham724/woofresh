<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
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
       			"image"=>"-",
       			"name"=>'id'
       		],
       		[
       			"id"=>2,
       			"image"=>"-",
       			"name"=>'en'
       		],
       		[
       			"id"=>3,
       			"image"=>"-",
       			"name"=>'fr'
       		]
       ];

       Language::insert($data);
    }
}

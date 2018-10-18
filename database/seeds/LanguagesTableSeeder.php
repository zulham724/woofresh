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
       		  "image"=>"uploads/avatars/MC.png",
       			"name"=>'id'
       		],
       		[
       			"id"=>2,
       			"image"=>"uploads/avatars/england.png",
       			"name"=>'en'
       		],
       		[
       			"id"=>3,
       			"image"=>"uploads/avatars/FK.png",
       			"name"=>'fr'
       		]
       ];

       Language::insert($data);
    }
}

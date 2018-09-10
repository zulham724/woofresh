<?php

use Illuminate\Database\Seeder;
use App\Subdistrict;

class SubdistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(database_path('csv/districts.csv'),"r");
		$subdistricts = array();
		while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
		    $subdistricts[] = $row;
		}
		foreach ($subdistricts as $s) {
            $subdistrict = new Subdistrict();
            $subdistrict->id = $s[0];
            $subdistrict->city_id = $s[1];
            $subdistrict->name = $s[2];
            $subdistrict->save();
        }
    }
}

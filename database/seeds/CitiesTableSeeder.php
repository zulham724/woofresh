<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//json
        // $jsonCities = File::get(database_path('json/cities.json'));
        // $dataCities = json_decode($jsonCities);
        // $dataCities = collect($dataCities);
        // foreach ($dataCities as $d) {
        //     $d = collect($d)->toArray();
        //     $city = new City();
        //     $city->id = $d['city_id'];
        //     $city->state_id = $d['province_id'];
        //     $city->name = $d['city_name'];
        //     $city->save();
        // }

        $file = fopen(database_path('csv/cities.csv'),"r");
		$data = array();
		while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
		    $data[] = $row;
		}
		foreach ($data as $d) {
            $s = new City();
            $s->id = $d[0];
            $s->state_id = $d[1];
            $s->name = $d[2];
            $s->save();
        }
    }
}

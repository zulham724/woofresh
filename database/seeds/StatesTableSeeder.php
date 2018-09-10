<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//json
		// $jsonProvinces = File::get(database_path('json/provinces.json'));
  		// $dataProvinces = json_decode($jsonProvinces);
  		// $dataProvinces = collect($dataProvinces);

  		// foreach ($dataProvinces as $d) {
  		// $d = collect($d)->toArray();
  		// $state = new State();
  		// $state->id = $d['province_id'];
  		// $state->name = $d['province_name'];
  		// $state->save();
  		// }
        //csv
        $file = fopen(database_path('csv/provinces.csv'),"r");
		$data = array();
		while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
		    $data[] = $row;
		}
		foreach ($data as $d) {
            $s = new State();
            $s->id = $d[0];
            $s->name = $d[1];
            $s->save();
        }
    }
}

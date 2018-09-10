<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
            LanguagesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            SubdistrictsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}

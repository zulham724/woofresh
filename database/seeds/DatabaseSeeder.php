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
            ContentsTableSeeder::class,
            ContentTranslationsTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            SubdistrictsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            BiodatasTableSeeder::class,
            DeliveryFeesTableSeeder::class,
            GroupsTableSeeder::class,
            CategoriesTableSeeder::class,
            SubCategoriesTableSeeder::class,
            SuppliersTableSeeder::class,
            //ComponentsTableSeeder::class,
            ComponentListsTableSeeder::class,
            //ComponentValuesTableSeeder::class,
            ProductsTableSeeder::class,
            ProductTranslationsTableSeeder::class,
            ProductImagesTableSeeder::class,
            RecipesTableSeeder::class,
            RecipeTutorialsTableSeeder::class,
            RecipeImagesTableSeeder::class,
            IngredientsTableSeeder::class,
            TransactionsTableSeeder::class,
            OrdersTableSeeder::class,
            VouchersTableSeeder::class,
        ]);
    }
}

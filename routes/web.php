<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

	Route::resources([
		'/languages'=>'LanguageController',
		'/users'=>'UserController',
		'/biodata'=>'BiodataController',
		'/products'=>'ProductController',
		'/recipe'=>'RecipeController',
		'/order'=>'OrderController',
		'/supplier'=>'SupplierController',
		'/transaction'=>'TransactionController',
		'/role'=>'RoleController',
		'/ingredient'=>'IngredientController',
		'/content'=>'ContentController',
		'/component'=>'ComponentController',
		'/componentvalue'=>'ComponentValueController',
		'/city'=>'CityController',
		'/group'=>'GroupController',
		'/category'=>'CategoryController',
		'/subcategory'=>'SubCategoryController',
	]);

});
// end middleware auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

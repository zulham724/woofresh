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

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('test',function(){
	$file = fopen(database_path('csv/districts.csv'),"r");
	$csv = array();
	while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
	    $csv[] = $row;
	}
	return response()->json($csv);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

	Route::resources([
		'/languages'=>'LanguageController',
		'/users'=>'UserController',
		'/recipes'=>'RecipeController',
		'/transactions'=>'TransactionController',
		'/biodatas'=>'BiodataController',
		'/products'=>'ProductController',
		'/orders'=>'OrderController',
		'/suppliers'=>'SupplierController',
		'/roles'=>'RoleController',
		'/ingredients'=>'IngredientController',
		'/contents'=>'ContentController',
		'/components'=>'ComponentController',
		'/componentvalues'=>'ComponentValueController',
		'/cities'=>'CityController',
		'/groups'=>'GroupController',
		'/categories'=>'CategoryController',
		'/subcategories'=>'SubCategoryController',
		'/users'=>'UserController',
		'/states'=>'StateController',
		'/deliveryfees'=>'DeliveryFeeController',
		'/vouchers'=>'VoucherController',
		'/subdistricts'=>'SubdistrictController',
		'/recipeimages'=>'RecipeImageController',
		'/productimages'=>'ProductImageController',
		'/productsales'=>'ProductSalesController',
		'/componentlists'=>'ComponentListController'
	]);

});
// end middleware auth

Route::get('/home', 'HomeController@index')->name('home');

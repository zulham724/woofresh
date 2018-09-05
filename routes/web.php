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
	return route('users.show',2);
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
		'/recipeimage'=>'RecipeImageController',
		'/productimage'=>'ProductImageController',
		'/productsales'=>'ProductSalesController',
		'/componentlists'=>'ComponentListController'
	]);
Route::post('/product/{id}/group','ProductController@group')->name('group');
Route::post('/product/{id}/category','ProductController@category')->name('category');
Route::post('/product/{id}/subcategory','ProductController@subcategory')->name('subcategory');
Route::post('/product/{id}/state','ProductController@state')->name('state');
Route::post('/product/{id}/city','ProductController@city')->name('city');
Route::post('/product/{id}/subdistrict','ProductController@subdistrict')->name('subdistrict');


});
// end middleware auth

Route::get('/home', 'HomeController@index')->name('home');

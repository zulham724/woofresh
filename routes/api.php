<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/client','API\ClientController@index');
Route::post('/register','API\UserController@store');
Route::post('/forgot/password', 'API\Auth\ForgotPasswordController')->name('forgot.password');

Route::group(['middleware'=>'auth:api','namespace'=>'API'],function(){

	Route::apiResources([
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
		'/componentlists'=>'ComponentListController',
		'/componentvalues'=>'ComponentValueController',
		'/states'=>'StateController',
		'/cities'=>'CityController',
		'/groups'=>'GroupController',
		'/categories'=>'CategoryController',
		'/subcategories'=>'SubCategoryController',
		'/vouchers'=>'VoucherController',
		'/subdistricts'=>'SubdistrictController',
		'/productratings'=>'ProductRatingController'
	]);

	
	Route::get('/products/group/{id}','ProductController@group')->name('group');
	Route::get('/products/category/{id}','ProductController@category')->name('category');
	Route::get('/products/subcategory/{id}','ProductController@subcategory')->name('subcategory');
	Route::get('/products/state/{id}','ProductController@state')->name('state');
	Route::get('/products/city/{id}','ProductController@city')->name('city');
	Route::get('/products/subdistrict/{id}','ProductController@subdistrict')->name('subdistrict');
	Route::get('/states/search/{id}','StateController@search')->name('search');
	Route::get('/products/search/{id}','ProductController@search')->name('search');
	Route::get('/recipes/search/{id}','RecipeController@search')->name('search');
	Route::get('/components/search/{id}','ComponentController@search')->name('search');
	Route::get('/suppliers/search/{id}','SupplierController@search')->name('search');
	Route::get('/ingredients/search/{id}','IngredientController@search')->name('search');
	Route::get('/vouchers/search/{id}','VoucherController@search')->name('search');
	Route::get('/cities/search/{id}','CityController@search')->name('search');
	Route::get('/groups/search/{id}','GroupController@search')->name('search');
	
	
});

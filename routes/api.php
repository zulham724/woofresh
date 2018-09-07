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
		'/componentvalues'=>'ComponentValueController',
		'/states'=>'StateController',
		'/cities'=>'CityController',
		'/groups'=>'GroupController',
		'/categories'=>'CategoryController',
		'/subcategories'=>'SubCategoryController',
	]);

	
	Route::get('/products/{id}/group','ProductController@group')->name('group');
	Route::get('/products/{id}/category','ProductController@category')->name('category');
	Route::get('/products/{id}/subcategory','ProductController@subcategory')->name('subcategory');
	Route::get('/products/{id}/state','ProductController@state')->name('state');
	Route::get('/products/{id}/city','ProductController@city')->name('city');
	Route::get('/products/{id}/subdistrict','ProductController@subdistrict')->name('subdistrict');
	
});

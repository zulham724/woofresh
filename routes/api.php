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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user()->load('biodata','role','recipes','transactions');
});

Route::get('/client','API\ClientController@index');
Route::post('/register','API\UserController@store');
Route::post('/forgot/password', 'API\Auth\ForgotPasswordController');

Route::group(['middleware'=>'auth:api','namespace'=>'API'],function(){

	Route::apiResources([
		'/languages'=>'LanguageController',
		'/users'=>'UserController',
		'/recipes'=>'RecipeController',
		'/recipeimages'=>'RecipeImageController',
		'/recipecomments'=>'RecipeCommentController',
		'/recipetutorials'=>'RecipeTutorialController',
		'/transactions'=>'TransactionController',
		'/biodatas'=>'BiodataController',
		'/products'=>'ProductController',
		'/orders'=>'OrderController',
		'/suppliers'=>'SupplierController',
		'/roles'=>'RoleController',
		'/ingredients'=>'IngredientController',
		'/contentlists'=>'ContentListController',
		'/contents'=>'ContentController',
		'/components'=>'ComponentController',
		'/componentlists'=>'ComponentListController',
		'/states'=>'StateController',
		'/cities'=>'CityController',
		'/groups'=>'GroupController',
		'/categories'=>'CategoryController',
		'/subcategories'=>'SubCategoryController',
		'/vouchers'=>'VoucherController',
		'/subdistricts'=>'SubdistrictController',
		'/productratings'=>'ProductRatingController',
		'/deliveryfees'=>'DeliveryFeeController',
		'/shippingaddresses'=>'ShippingAddressController'
	]);

	
	Route::get('/products/group/{id}','ProductController@group');
	Route::get('/products/category/{id}','ProductController@category');
	Route::get('/products/subcategory/{id}','ProductController@subcategory');
	Route::get('/products/state/{id}','ProductController@state');
	Route::get('/products/city/{id}','ProductController@city');
	Route::get('/products/subdistrict/{id}','ProductController@subdistrict');
	Route::get('/states/search/{id}','StateController@search');
	Route::get('/products/search/{id}','ProductController@search');
	Route::get('/recipes/search/{id}','RecipeController@search');
	Route::get('/components/search/{id}','ComponentController@search');
	Route::get('/suppliers/search/{id}','SupplierController@search');
	Route::get('/ingredients/search/{id}','IngredientController@search');
	Route::get('/vouchers/search/{id}','VoucherController@search');
	Route::get('/cities/search/{id}','CityController@search');
	Route::get('/groups/search/{id}','GroupController@search');
	Route::get('/subdistricts/search/{id}','SubdistrictController@search');
	Route::get('/categories/search/{id}','CategoryController@search');
	Route::get('/subcategories/search/{id}','SubCategoryController@search');
	Route::get('/users/search/{id}','UserController@search');
	Route::get('/transactions/search/{id}','TransactionController@search');
	Route::get('/languages/search/{id}','LanguageController@search');
	Route::get('/contents/search/{id}','ContentController@search');
	Route::get('/cities/state/{id}','CityController@state');
	
	
});

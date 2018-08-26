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

Route::group(['middleware'=>'auth:api','namespace'=>'API'],function(){

	Route::apiResources([
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

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Product;
use App\Recipe;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::with('recipe')->with('product')->get();
        return response()->json($ingredients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient;
        $ingredient->fill($request->all());
        $ingredient->save();

        return response()->json($ingredient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = User::with('recipes')->find($id);
        return response()->json($ingredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->fill($request->all());
        $ingredient->update();
        return response()->json($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id)->delete();
        return response()->json($ingredient);
    }
    public function search($ingredient)
    {
        $ingredients = Ingredient::with(['product.product_translations'=>function($query)use($ingredient){
            $query->where('name','like',"%".$ingredient."%");
        }])
        ->whereHas('product.product_translations',function($query)use($ingredient){
            $query->where('name','like',"%".$ingredient."%");
        })
        ->get();

        return response()->json($ingredients);
    }
}

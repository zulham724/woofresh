<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
       $data["ingredients"] = Ingredient::with('recipe')->with('product')->get();
        return view('ingredient.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["ingredients"] = Ingredient::get();
        $data["products"] = Product::get();
        $data["recipes"] = Recipe::get();
        return view('ingredient.create',$data);
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

        return redirect()->route('ingredients.index',$ingredient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["recipes"] = User::with('recipes')->find($id);
        return view('recipes.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["ingredient"] = Ingredient::find($id);
        $data["recipes"] = Recipe::get();
        $data["products"] = product::get();
        // dd($data);
        return view('ingredient.edit',$data);
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
        // dd($request);
        $ingredient = ingredient::find($id);
        $ingredient->fill($request->all());
        $ingredient->update();

        return redirect()->route('ingredients.index',$ingredient->user_id);
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
}

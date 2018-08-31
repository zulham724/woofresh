<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\User;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["recipes"] = Recipe::get();
        return view('recipe.index',$data);
    }
     public function create()
    {
        $data["recipes"] = Recipe::get();
        $data["users"] = User::get();
        return view('recipe.create',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe;
        $recipe->fill($request->all());
        $recipe->save();

        return redirect()->route('recipes.index',$recipe->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
     public function edit($id)
    {
        $data["recipe"] = Recipe::find($id);
        // dd($data);
        $data["users"] = User::get();
        return view('recipe.edit',$data);
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
        $recipe = Recipe::find($id);
        $recipe->fill($request->all());
        $recipe->update();

        return redirect()->route('recipes.index',$recipe->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id)->delete();
        return response()->json($recipe);
    }
}

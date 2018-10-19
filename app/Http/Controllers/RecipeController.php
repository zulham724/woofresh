<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product; 
use App\ProductTranslation;
use App\Recipe;
use App\User;
use App\RecipeTutorial;
use App\RecipeImage;
use App\Ingredient;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["recipes"] = Recipe::with('user')->orderBy('created_at','desc')->get();
        // dd($data);
        return view('recipe.index',$data);
    }

    /**m
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // dd($request);
        $recipe = new Recipe;
        $recipe->fill($request['order']);
        $recipe->save();

         // dd($recipe);

         foreach ($request['ingredients'] as $i => $ingredient) {
            $db = new Ingredient;
            $db->fill($ingredient);
            $db->recipe_id = $recipe->id;
            $db->save();
        }

        foreach ($request['recipetutorials'] as $rt => $recipetutorial) {
            $data = new RecipeTutorial;
            $data->fill($recipetutorial);
            $data->recipe_id = $recipe->id;
            $data->save();
        }

        foreach ($request['recipeimages'] as $ri => $recipeimage) {
            $recipeimages = new RecipeImage;
            $recipeimages->fill($recipeimage);
            $recipeimages->recipe_id = $recipe->id;
            if (isset($recipeimage["image"])){
                $path = $recipeimage['image']->store('recipeimage');
                $recipeimages->image = $path;
            }
            $recipeimages->save();
        }

        // dd($request);

        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["recipe"] = Recipe::with('ingredients.product.product_translations')->find($id);
        return view('recipe.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data["recipe"] = Recipe::with('ingredients.product.product_translations','recipe_tutorials','recipe_images')->find($id);
       $data["users"] = User::get();
        // dd($data);
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
        // dd($request);
        $recipe = Recipe::find($id);
        $recipe->fill($request->except(['ingredients','recipetutorials','recipeimages']));
        $recipe->update();

        // dd($umkm_products);
        foreach ($request['ingredients'] as $i => $ingredient) {
            $db = Ingredient::firstOrNew(['id'=>$ingredient['id'] ?? 0]);
            $db->fill($ingredient);    
            $db->recipe_id = $recipe->id;
            $db->save();
        }

        foreach ($request['recipetutorials'] as $rt => $recipetutorial) {
            $data = RecipeTutorial::firstOrNew(['id'=>$recipetutorial['id'] ?? 0]);
            $data->fill($recipetutorial);
            $data->recipe_id = $recipe->id;
            $data->save();
        }

        foreach ($request['recipeimages'] as $ri => $recipeimage) {
            $recipeimages = RecipeImage::firstOrNew(['id'=>$recipeimage['id'] ?? 0]);
            $recipeimages->fill($recipeimage);
            $recipeimages->recipe_id = $recipe->id;
            if (isset($recipeimage["image"])){
                $path = $recipeimage['image']->store('recipeimage');
                $recipeimages->image = $path;
            }
            $recipeimages->save();
        }

        return redirect()->route('recipes.index');
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

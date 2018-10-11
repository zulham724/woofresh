<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\RecipeImage;

class RecipeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recieimages = RecipeImage::get();
        return response()->json($recipeimages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipeimage = new RecipeImage;
        $recipeimage->fill($request->all());
        if($request->hasFile('image')){
            $path = $request->file('image')->store('recipeimages');
            $recipeimage->image = $path;
        }
        $recipeimage->save();
        return response()->json($recipeimage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipeimage = RecipeImage::find($id);
        return response()->json($recipeimage);
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
        $recipeimage = RecipeImage::find($id);
        $recipeimage->fill($request->all());
        if($request->hasFile('image')){
            $file = Storage::delete($recipeimage->image);
            $path = $request->file('image')->store('recipeimages');
            $recipeimage->image = $path;
        }
        $recipeimage->update();
        return response()->json($recipeimage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipeimage = RecipeImage::find($id);
        $file = Storage::delete($recipeimage->image);
        $recipeimage->delete();
        return response()->json($recipeimage);
    }
}

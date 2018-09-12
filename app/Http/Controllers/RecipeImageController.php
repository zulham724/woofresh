<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecipeImage;
use App\Recipe;
use Illuminate\Support\Facades\Storage;


class RecipeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["recipeimages"] = RecipeImage::get();
        return view('recipeimage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["recipeimages"] = RecipeImage::get();
         $data["recipes"] = Recipe::get();
        return view('recipeimage.create',$data);  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipeimage = new RecipeImage();
        $recipeimage->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipeimage');
            $recipeimage->image = $path;    
        }
        $recipeimage->save();

        return redirect('recipeimages');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["recipes"] = Recipe::get();
        $data["recipeimage"] = RecipeImage::find($id);
        // dd($data);
        return view('recipeimage.edit',$data);
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
        $recipeimage = RecipeImage::find($id);
        $recipeimage->fill($request->all());
        if($request->hasFile('image')){
            $file = Storage::delete($recipeimage->image);
            $path = $request->file('image')->store('recipeimages');
            $recipeimage->image = $path;
        }
        $recipeimage->update();

        return redirect('recipeimages');
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

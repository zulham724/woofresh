<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecipeComment;

class RecipeCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipecomment = RecipeComment::get();
        return response()->json($recipecomment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipecomment = new RecipeComment;
        $recipecomment->fill($request->all());
        $recipecomment->save();
        return response()->json($recipecomment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipecomment = RecipeComment::find($id);
        return response()->json($recipecomment);
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
        $recipecomment = RecipeComment::find($id);
        $recipecomment->fill($request->all());
        $recipecomment->save();
        return response()->json($recipecomment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipecomment = RecipeComment::find($id)->delete();
        return response()->json($recipecomment);
    }
}

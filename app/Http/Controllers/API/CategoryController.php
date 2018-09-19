<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Group;
use App\CategoryTranslation;
use App\Language;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('category_translations.language')->get();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('categories');
        $category = new Category;
        $category->fill($request->except('languages'));
        $category->image = $path;
        $category->save();

        foreach ($request['languages'] as $l => $language) {
            $translation = new CategoryTranslation;
            $translation->category_id = $category->id;
            $translation->language_id = $language['language_id'];
            $translation->name = $language['name'];
            $translation->save();
             }

        return response()->json($category);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());
        $category->update();

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return response()->json($category);
    }
    public function search($category)
    {
        $categories = Category::where('name','like',"%".$category."%")->get();

        return response()->json($categories);
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\SubCategory;
use App\Category;
use App\SubCategoryTranslation;
use App\Language;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::with('sub_category_translations.language')
        ->get();
        return response()->json($subcategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = new SubCategory;
        $subcategory->fill($request->except('languages'));
        $path = $request->file('image')->store('subcategories');
        $subcategory->image = $path;
        $subcategory->save();

        return response()->json($subcategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = Subcategory::find($id);
        return response()->json($subcategory);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->fill($request->all());
        if($request->hasFile('image')){
            $file = Storage::delete($subcategory->image);
            $path = $request->file('image')->store('subcategories');
            $subcategory->image = $path;
        }
        $subcategory->update();
        return response()->json($subcategory);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $file = Storage::delete($subcategory->image);
        $subcategory->delete();
        return response()->json($subcategory);
    }
    public function search($subcategory)
    {
        $subcategories = SubCategory::where('name','like',"%".$subcategory."%")->get();

        return response()->json($subcategories);
    }
}

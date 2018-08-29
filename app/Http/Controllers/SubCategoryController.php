<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        
        $data["subcategories"] = SubCategory::with('sub_category_translations.language')->get();
        return view('subcategory.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["languages"] = Language::get();
        $data['subcategories'] = Category::get();
        return view('subcategory.create',$data);
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
        $subcategory->save();

        foreach ($request['languages'] as $l => $language) {
            $translation = new SubCategoryTranslation;
            $translation->sub_category_id = $subcategory->id;
            $translation->language_id = $language['language_id'];
            $translation->name = $language['name'];
            $translation->save();
        }
        return redirect('subcategories');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id)->delete();
        return response()->json($subcategory);
    }
}

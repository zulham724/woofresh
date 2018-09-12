<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $path = $request->file('image')->store('subcategories');
        $subcategory = new SubCategory;
        $subcategory->fill($request->except('languages'));
        $subcategory->image = $path;
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
         $data["categories"] = Category::get();
         $data["subcategory"] = SubCategory::find($id);
        // dd($data);
        return view('subcategory.edit',$data);
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
        $subcategory = SubCategory::find($id);
        $subcategory->fill($request->all());
        if($request->hasFile('image')){
            $file = Storage::delete($subcategory->image);
            $path = $request->file('image')->store('subcategories');
            $subcategory->image = $path;
        }
        $subcategory->update();

        return redirect('subcategories');
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        
        $data["categories"] = Category::with('category_translations.language')->get();
        return view('category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::get();
        $data['groups'] = Group::get();
        return view('category.create',$data);
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
        return redirect('categories');
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
        $data["category"] = Category::find($id);
        $data["groups"] = Group::get();
        // dd($data);
        return view('category.edit',$data);
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
        if($request->hasFile('image')){
            $file = Storage::delete($category->image);
            $path = $request->file('image')->store('categories');
            $category->image = $path;
        }
        $category->update();

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $file = Storage::delete($category->image);
        $category->delete();
        return response()->json($category);
    }
}

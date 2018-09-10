<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language; // daftarkan model Languge terlebih dahulu
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["languages"] = Language::get(); // rangkum menjadi sebuah data yang berisikan model languages
        return view('language.index',$data); // kasih data language ke dalam view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.create');
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
        $path = $request->file('image')->store('languages');
        $language = new Language;
        $language->fill($request->all());
        $language->image = $path;
        $language->save();
        return redirect('languages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["language"] = Language::find($id);
        return view('language.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["language"] = Language::find($id);
        // dd($data);
        return view('language.edit',$data);
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
        $language = Language::find($id);
        $language->fill($request->all());
        if($request->hasFile('image')){
            $file = Storage::delete($language->image);
            $path = $request->file('image')->store('languages');
            $language->image = $path;
        }
        $language->update();

        return redirect('languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $language = Language::find($id);
        $file = Storage::delete($language->image);
        $language->delete();
        
        return response()->json($language);
    }
}

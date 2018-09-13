<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use App\ComponentList;
use App\Product;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data["components"] = Component::get();
        return view('component.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data["componentlists"] = ComponentList::get();
       $data["products"]= Product::with('product_translations')->get();
       // dd($data);
       return view('component.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $component= new Component;
        $component->fill($request->all());
        $component->save();

        return redirect('components');
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
        $data["component"] = Component::with('component_list')->find($id);
        $data["componentlists"] = ComponentList::get();
        $data["products"] = Product::get();
        // dd($data);
        return view('component.edit',$data);
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
        $component = Component::find($id);
        $component->fill($request->all());
        $component->update();

        return redirect('components');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $component = Component::find($id)->delete();
        return response()->json($component);
    }
}

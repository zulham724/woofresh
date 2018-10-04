<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ComponentValue;

class ComponentValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $componentvalues = ComponentValue::get();
     return response()->json($componentvalues);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $componentvalue = new ComponentValue;
        $componentvalue->fill($request->all());
        $componentvalue->save();
        return response()->json($componentvalue);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $componentvalue = Componentvalue::find($id);
        return response()->json($componentvalue);
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
        $componentvalue = Componentvalue::find($id);
        $componentvalue->fill($request->all());
        $componentvalue->save();
        return response()->json($componentvalue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $componentvalue = Componentvalue::find($id)->delete();
        return response()->json($componentvalue);
    }
}
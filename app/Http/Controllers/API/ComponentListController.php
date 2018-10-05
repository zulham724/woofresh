<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ComponentList;

class ComponentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $componentlists = ComponentList::get();
        return response()->json($componentlists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $componentlist = new ComponentList;
        $componentlist->fill($request->all());
        $componentlist->save();
        return response()->json($componentlist);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $componentlist = ComponentList::find($id);
        return response()->json($componentlist);
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
        $componentlist = ComponentList::find($id);
        $componentlist->fill($request->all());
        $componentlist->update();
        return response()->json($componentlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $componentlist = ComponentList::find($id);
        $componentlist->delete();
        return response()->json($componentlist);
    }
}

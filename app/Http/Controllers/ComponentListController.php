<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data["componentlists"] = ComponentList::get();
        return view('componentlist.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["componentlists"] = ComponentList::get();
        return view('componentlist.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $componentlist= new ComponentList;
        $componentlist->fill($request->all());
        $componentlist->save();
        return redirect('componentlists');
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
        $data["componentlist"] = ComponentList::find($id);
        // dd($data);
        return view('componentlist.edit',$data);
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

        return redirect('componentlists');
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
        $componentlist = ComponentList::find($id);
        $componentlist->delete();
        
        return response()->json($componentlist);
    }
}

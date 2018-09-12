<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subdistrict;
use App\City;

class SubdistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data["subdistricts"] = Subdistrict::get();
        return view('subdistrict.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["subdistricts"] = Subdistrict::get();
        $data["cities"] = City::get();
        return view('subdistrict.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subdistrict = new Subdistrict();
        $subdistrict->fill($request->all());
        $subdistrict->save();

        return redirect('subdistricts');
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
       $data["subdistrict"] = Subdistrict::find($id);
        // dd($data);
        $data["cities"] = City::get();
        return view('subdistrict.edit',$data);
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
        $subdistrict = Subdistrict::find($id);
        $subdistrict->fill($request->all());
        $subdistrict->update();

        return redirect()->route('subdistricts.index',$subdistrict->city_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

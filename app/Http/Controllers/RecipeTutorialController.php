<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecipeTutorial;
use App\Recipe;

class RecipeTutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["recipetutorials"] = RecipeTutorial::get();
        return view('recipetutorial.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["recipes"] = Recipe::get();
        return view('recipetutorial.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipetutorial = new RecipeTutorial;
        $recipetutorial->fill($request->all());
        $recipetutorial->save();
        return redirect()->route('recipetutorial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["recipetutorial"] = RecipeTutorial::find($id);
        return view('recipetutorial.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["recipetutorial"] = RecipeTutorial::find($id);
        return view('recipetutorial.edit');
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
        $recipetutorial = RecipeTutorial::find($id);
        $recipetutorial->fill($request->all());
        $recipetutorial->update();
        return redirect()->route('recipetutorial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipetutorial = RecipeTutorial::find($id)->delete();
        return redirect()->route('recipetutorial.index');
    }
}

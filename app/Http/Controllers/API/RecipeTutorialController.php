<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecipeTutorial;

class RecipeTutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipetorial = RecipeTutorial::with('recipe')->get();
        return response()->json($recipetorial);
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
        return response()->json($recipetutorial);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipetutorial = RecipeTutorial::with('recipe')->find($id);
        return response()->json($recipetutorial);
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
        $recipetutorial->save();
        return response()->json($recipetutorial);
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
        return response()->json($recipetutorial);
    }
}

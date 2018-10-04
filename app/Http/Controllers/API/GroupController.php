<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\GroupTranslation;
use App\Language;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('group_translations.language')->get();
        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('groups');
        $group = new Group;
        $group->fill($request->except('languages'));
        $group->image = $path;
        $group->save();

        foreach ($request['languages'] as $l => $language) {
            $translation = new GroupTranslation;
            $translation->group_id = $group->id;
            $translation->language_id = $language['language_id'];
            $translation->name = $language['name'];
            $translation->save();
        }
        return response()->json($group);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return response()->json($group);
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
        $group = Group::find($id);
        $group->fill($request->all());
        $group->save();
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id)->delete();
        return response()->json($group);
    }
    public function search($group)
    {
        $groups = Group::with(['group_translations'=>function($query)use($group){
            $query->where('name','like',"%".$group."%");
        }])
        ->whereHas('group_translations',function($query)use($group){
            $query->where('name','like',"%".$group."%");
        })
        ->get();

        return response()->json($groups);
    }
}

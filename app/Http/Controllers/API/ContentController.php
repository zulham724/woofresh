<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::with('content_translations.language')->get();

        return response()->json($content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Content;
        $content->name = $request["name"];
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('content');
            $content->image = $path;    
        }
        $content->save();

        foreach ($request['languages'] as $l => $language) {
            $translation = new ContentTranslation;
            $translation->content_id = $content->id;
            $translation->language_id = $language['language_id'];
            $translation->name = $language['name'];
            $translation->description = $language['description'];
            $translation->save();
        }

        return response()->json($content);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::with('content_translations.language')->find($id);
        return response()->json($content);
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
        $content = Content::find($id);
        $content->name = $request["name"];
        if($request->hasFile('image')){
            $file = Storage::delete($content->image);
            $path = $request->file('image')->store('content');
            $content->image = $path;
        }
        $content->update();
        foreach ($request['languages'] as $l => $language) {
            $translation = ContentTranslation::updateOrCreate([
                "content_id"=>$content->id,
                "language_id"=>$language['language_id'],
                'name'=>$language['name'],
                'description'=>$language['description']
            ]);
        }

        return response()->json($content);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        $file = Storage::delete($content->image);
        $content->delete();
        return response()->json($content);
    }
    public function search($content)
    {
        $contents = Content::where('name','like',"%".$content."%")->get();

        return response()->json($contents);
    }
}

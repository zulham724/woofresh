<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Content;
use App\ContentTranslation;
use App\Language;
use App\ContentList;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["contents"] = Content::with('content_translations.language','content_list')->get();
        return view('content.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["languages"] = Language::get();
        $data["content_lists"] = ContentList::get();
        return view('content.create',$data);
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
        $content = new Content;
        $content->name = $request["name"];
        $content->content_list_id = $request["content_list_id"];
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

        return redirect('contents');
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
        $data["content"] = Content::with('content_translations.language')->find($id);
        $data["languages"] = Language::get();
        $data["content_lists"] = ContentList::get();
        // dd($data);
        return view('content.edit',$data);
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
        // dd($request);
        $content = Content::find($id);
        $content->name = $request["name"];
        $content->content_list_id = $request["content_list_id"];
        if($request->hasFile('image')){
            $file = Storage::delete($content->image);
            $path = $request->file('image')->store('content');
            $content->image = $path;
        }
        $content->update();
        foreach ($request['languages'] as $l => $language) {
            $translation = ContentTranslation::updateOrCreate(
            [
                "id"=>$language['id']
            ],
            [
                "content_id"=>$content->id,
                "language_id"=>$language['language_id'],
                'name'=>$language['name'],
                'description'=>$language['description']
            ]);
        }
        return redirect('contents');
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
}

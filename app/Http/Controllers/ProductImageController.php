<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage;
use App\Product;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["productimages"] = ProductImage::get();
        return view('productimage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["productimages"] = ProductImage::get();
         $data["products"] = Product::with('product_translations')->get();
        return view('productimage.create',$data);
          }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productimage = new ProductImage();
        $productimage->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('productimage');
            $productimage->image = $path;    
        }
        $productimage->save();

        return redirect('productimages');
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
        //
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productimage = ProductImage::find($id);
        $productimage->delete();
        return response()->json($productimage);
    }
}

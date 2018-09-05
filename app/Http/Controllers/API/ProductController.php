<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory; 
use App\Supplier; 
use App\City;
use App\Language;
use App\ProductTranslation;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::
        with('supplier')
        ->with('product_translations.language')
        ->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->fill($request->except('languages'));
        $product->save();

        foreach ($request['languages'] as $l => $language) {
            $translation = new ProductTranslation;
            $translation->product_id = $product->id;
            $translation->language_id = $language['language_id'];
            $translation->name = $language['name'];
            $translation->description = $language['description'];
            $translation->save();
        }
        return response()->json($product);
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
        $product = Product::find($id)->delete();
        return response()->json($product);
    }

    public function group($id){
        $products = Product::with('group')->find($id)->get();
        return response()->json($products);
    }

    public function category($id){
        $products = Product::with('category')->find($id)->get();
        return response()->json($products);
    }
    public function subcategory($id){
        $products = Product::with('subcategory')->find($id)->get();
        return response()->json($products);
    }
    public function state($id){
        $products = Product::with('state')->find($id)->get();
        return response()->json($products);
    }
    public function city($id){
        $products = Product::with('city')->find($id)->get();
        return response()->json($products);
    }
    public function subdistrict($id){
        $products = Product::with('subdistict')->find($id)->get();
        return response()->json($products);
    }
}

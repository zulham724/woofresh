<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product; 
use App\SubCategory; 
use App\Supplier;
use App\Language;
use App\ProductTranslation;
use App\Group;
use App\Category;
use App\State;
use App\ProductSale;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["products"] = Product::
        with('supplier')
        ->with('group')
        ->with('product_translations.language')
        ->get();
        return view('product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["states"] = State::get();
        $data["languages"] = Language::get();
        $data['subcategories'] = SubCategory::get();
        $data['suppliers'] = Supplier::get();
        $data['groups'] = Group::get();
        $data['categories'] = Category::get();
        return view('product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->request);
        $product = new Product;
        $product->fill($request->except(['languages','sales']));
        $product->save();

        foreach ($request['languages'] as $l => $language) {
            $translation = new ProductTranslation;
            $translation->product_id = $product->id;
            $translation->language_id = $language['language_id'];
            $translation->name = $language['name'];
            $translation->description = $language['description'];
            $translation->save();
        }

        foreach ($request['sales'] as $s => $sale) {
            $product_sale = new ProductSale;
            $product_sale->product_id = $product->id;
            $product_sale->state_id = $sale['state_id'];
            $product_sale->stocks = $sale['stock'];
            $product_sale->price = $sale['price'];
            $product_sale->discount = $sale['discount'];
            $product_sale->save();
        }

        return redirect('products');
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
        $product = Product::find($id)->delete();
        return response()->json($product);
    }
}

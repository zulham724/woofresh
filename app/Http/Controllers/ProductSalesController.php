<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ProductSale; 
use App\Product; 
use App\State; 
use App\City; 
use App\Subdistrict;
class ProductSalesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["productsales"] = ProductSale::
        with('product.product_translations','city','state')
        ->get();
        return view('productsales.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["products"] = Product::with('product_translations')->get();
        $data["states"] = State::get();
        $data["cities"] = City::get();
        $data["subdistricts"] = Subdistrict::get();
        // dd($data['products'][0]['product_translations'][0]);
        return view('productsales.create',$data);
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
        $productsale = new ProductSale;
        $productsale->fill($request->all());
        $productsale->save();
        return redirect('productsales');
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
        $productsale = ProductSale::find($id)->delete();
        return response()->json($productsale);
    }
}

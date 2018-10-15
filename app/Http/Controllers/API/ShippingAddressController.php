<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShippingAddress;

class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingaddresses = ShippingAddress::with('transaction')->get();
        return response()->json($shippingaddresses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shippingaddress = new ShippingAddress;
        $shippingaddress->fill($request->all());
        $shippingaddress->save();
        return response()->json($shippingaddress);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shippingaddress = ShippingAddress::with('transaction')->find($id);
        return response()->json($shippingaddress);
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
        $shippingaddress = ShippingAddress::find($id);
        $shippingaddress->fill($request->all());
        $shippingaddress->update();
        return response()->json($shippingaddress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shippingaddress = ShippingAddress::find($id);
        $shippingaddress->delete();
        return response()->json($shippingaddress);
    }
}

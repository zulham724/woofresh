<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DeliveryFee;

class DeliveryFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryfees = DeliveryFee::with('state')->get();
        return response()->json($deliveryfees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deliveryfee = new DeliveryFee;
        $deliveryfee->fill($request->all());
        $deliveryfee->save();
        return response()->json($deliveryfee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deliveryfee = DeliveryFee::with('state')->find($id);
        return response()->json($deliveryfee);
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
        $deliveryfee = DeliveryFee::find($id);
        $deliveryfee->fill($request->all());
        $deliveryfee->update();
        return response()->json($deliveryfee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deliveryfee = DeliveryFee::find($id);
        $deliveryfee->delete();
        return response()->json($deliveryfee);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryFee;
use App\State;

class DeliveryFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["deliveryfees"] = DeliveryFee::with('state')->get();
        return view('deliveryfee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["states"] = State::get();
        return view('deliveryfee.create',$data);
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
        return redirect('deliveryfees');
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
      $data["deliveryfee"] = Deliveryfee::find($id);
        // dd($data);
        $data["states"] = State::get();
        return view('deliveryfee.edit',$data);
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
        $deliveryfee = Deliveryfee::find($id);
        $deliveryfee->fill($request->all());
        $deliveryfee->update();

        return redirect()->route('deliveryfees.index',$deliveryfee->state_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deliveryfee = DeliveryFee::find($id)->delete();
        return response()->json($deliveryfee);
    }
}

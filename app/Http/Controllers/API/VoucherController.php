<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Voucher;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::get();
        return response()->json($vouchers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucher = new Voucher();
        $voucher->fill($request->all());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('voucher');
            $voucher->image = $path;    
        }
        $voucher->save();

        return response()->json($voucher);
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
       $voucher = Voucher::find($id);
        $voucher->fill($request->all());
        if($request->hasFile('image')){
            $file = Storage::delete($voucher->image);
            $path = $request->file('image')->store('vouchers');
            $voucher->image = $path;
        }
        $voucher->update();

        return response()->json($voucher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        $file = Storage::delete($voucher->image);
        $voucher->delete();
        return response()->json($voucher);
    }
    public function search($voucher)
    {
        $vouchers = Voucher::where('name','like',"%".$voucher."%")->get();

        return response()->json($vouchers);
    }
}

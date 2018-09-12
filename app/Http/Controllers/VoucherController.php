<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
       $data["vouchers"] = Voucher::get();
        return view('voucher.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["vouchers"] = Voucher::get();
        return view('voucher.create',$data);
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

        return redirect('vouchers');
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
        $data["voucher"] = Voucher::find($id);
        // dd($data);
        return view('voucher.edit',$data);
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

        return redirect('vouchers');
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
}

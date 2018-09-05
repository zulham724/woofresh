<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Order;
use App\State;
use App\City;
use App\Subdistrict;
use App\Voucher;
use App\DeliveryFee;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["transactions"] = Transaction::get();
        return view('transaction.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["transactions"] = Transaction::get();
        $data["users"] = User::get();
        $data["states"] = State::get();
        $data["cities"] = City::get();
        $data["subdistricts"] = Subdistrict::get();
        $data["vouchers"] = Voucher::get();
        $data["deliveryfees"] = DeliveryFee::get();
        return view('transaction.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->fill($request->all());
        $transaction->save();

        return redirect()->route('transactions.index',$transaction->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["transaction"] = Transaction::with('orders')->find($id);
        return view('transaction.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["transaction"] = Transaction::find($id);
        // dd($data);
        $data["users"] = User::get();
        return view('transaction.edit',$data);
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
        $transaction = Transaction::find($id);
        $transaction->fill($request->all());
        $transaction->update();

        return redirect()->route('transactions.index',$transaction->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id)->delete();
        return response()->json($transaction);
    }
}

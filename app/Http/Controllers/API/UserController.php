<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('biodata')
        ->with('transactions.orders')
        ->with('recipes.ingredients.product')
        ->get();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist = User::where('email',$request["email"])->first();
        if($exist){
            return response()->json(['error'=>'duplicate email'],500);
        } else {
            $user = new User;
            $user->role_id = 2;
            if($request->hasFile('avatar')){
                $path = $request->file('avatar')->store('uploads/avatars');
                $user->avatar = $path;
            }
            $user->fill($request->all());
            $user->save();

            $biodata = new Biodata;
            $biodata->user_id = $user->id;
            $biodata->fill($request->except(['role_id','name','email','password','avatar']));
            $biodata->save();
            return response()->json($user);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('biodata')
        ->with('transactions.orders')
        ->with('recipes.ingredients.product')
        ->find($id);
        return response()->json($user);
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
        $user = User::find($id);
        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('uploads/avatars');
            $user->avatar = $path;
        }
        $user->fill($request->all());
        $user->update();

        $biodata = new Biodata;
        $biodata->user_id = $user->id;
        $biodata->fill($request->except(['role_id','name','email','password','avatar']));
        $biodata->update();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return response()->json($user);
    }
    public function search($user)
    {
        $users = User::where('name','like',"%".$user."%")->get();

        return response()->json($users);
    }
}

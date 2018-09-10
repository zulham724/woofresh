<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Biodata;
use App\Transaction;
use App\City;
use App\State;
use App\subdistrict; 
use App\Recipe;


class UserController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["users"] = User::with('role')->get();
        return view('user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::get();
        $data['cities'] = City::get();
        $data['states'] = State::get();
        $data['subdistricts'] = subdistrict::get();
        return view('user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = new User;
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

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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

        return redirect('users');
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

    public function recipe($id)
    {
        $data["user"] = User::with('recipes')->find($id);
        $data["recipes"] = Recipe::where('user_id',$id);
        return view('user.recipe',$data);
    } 
    public function transaction($id)
    {
      $data["users"] = User::with('transactions')->find($id);
        return view('user.show',$data);  
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();

        if(count($users)==0){
            return response()->json('Ne postoje registrovani korisnici u sistemu!');
        }
        $my_users=array();
        foreach($users as $user){
            array_push($my_users,new UserResource($user));
        }
        return $my_users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user=new User;
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $password=$request->password;
        // $cryptedPassword=bcrypt($password);
        // $user->email_verified_at=date('Y-m-d H:i:s');
        // $user->password=$cryptedPassword;

        // $result=$user->save();
        // if($result==true){
        //     return "Uspesna prijava!";
        // }
        // return "Neupsesna registracija!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user_id)
    {
        $user = User::find($user_id);
        if(is_null($user)){
            return response()->json('Data not found',404);
        }
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function getUserById($id){
        return User::findOrFail($id);
    }

    public function addUser(Request $request){
        $request->validate(['id' => 'required|unique:users', 'email' => 'required|unique:users']);
        return User::create(["name" => $request->name, "email" => $request->email, "password" => $request->password, "id" => $request->id, "last_name" => $request->last_name, "user" => $request->user]);
    }


    public function updateUserById($id, Request $request){
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->password = $request ->password;
      $user->email = $request ->email;
      $user->last_name = $request->last_name;
      $user->user = $request->user;
      $user->save();
      return response()->json("Todo bien", 200);
    }

    public function deleteUserById($id){
       $user = User::findOrFail($id);
       $user->delete();
       return response()->json("Todo bien, se elimino", 200);
    }

}




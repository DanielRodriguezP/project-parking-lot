<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterEmail;

class UserController extends Controller
{
    
    public function getUserById($id){
        return User::findOrFail($id);
    }

    public function addUser(Request $request){
        $request->validate(['id' => 'required|unique:users', 'email' => 'required|unique:users']);
        
        $user = User::create([
            "name" => $request->name, 
            "email" => $request->email, 
            "password" => $request->password, 
            "id" => $request->id, 
            "last_name" => $request->last_name, 
            "user" => $request->user, 
            "role" => $request->role, 
            "cell_phone_number" => $request->cell_phone_number,
            "status" => $request->status,
            "role" => 1
        ]);

        Mail::to($request->email)->send(new RegisterEmail($user));
        return response()->json(["message" => "Register email sent successfully"], 200);
    }


    public function updateUserById($id, Request $request){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->password = $request ->password;
        $user->email = $request ->email;
        $user->last_name = $request->last_name;
        $user->user = $request->user;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->cell_phone_number = $request->cell_phone_number;
        $user->save();
        return response()->json("Se actualizo el usuario satisfactoriamente", 200);
    }

    public function deleteUserById($id){
       $user = User::findOrFail($id);
       $user->delete();
       return response()->json("Se ha eliminado", 200);
    }

    public function login(Request $request){
        
        
    }

} 




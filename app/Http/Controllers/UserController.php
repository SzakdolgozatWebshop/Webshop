<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAll(){
        return User::all();
    }

    public function showOne($id){
        return User::find($id);
    }

    public function newPerm(Request $request, $id){
        $user = User::find($id);
        $user->permission = $request->permission;
        $user->save();
    }

    public function updateUser($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
    }
}

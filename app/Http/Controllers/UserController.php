<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAll(){
        return User::all();
    }

    public function newPerm(Request $request, $id){
        $user = User::find($id);
        $user->permission = $request->permission;
        $user->save();
    }
}

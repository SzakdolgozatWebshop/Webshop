<?php

namespace App\Http\Controllers;

use App\Models\OpcioModel;
use App\Models\Termek_jellemzo;
use App\Models\Tulajdonsag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function deleteUser($id){
        return User::find($id)->delete();
    }

    public function newTerJell(Request $request){
        $termekJell = new Termek_jellemzo();
        $termekJell->Termek = $request->Termek;
        $termekJell->Tulajdonsag = $request->Tulajdonsag;
        $termekJell->ertek = $request->ertek;
        $termekJell->save();
    }

    public function showTulajdonsag(){
        return Tulajdonsag::all();
    }
}

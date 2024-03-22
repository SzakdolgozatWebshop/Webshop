<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\KepModel;
use App\Models\Keszlet;
use App\Models\LeirasModel;
use App\Models\Rend_tetel;
use App\Models\Rendeles;
use App\Models\Termek;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Menedzser extends Controller
{
    //

    public function MenedzserFelhasznaloAll()
    {
        //Felhasználó lekérés all
        return User::all();
    }
    public function LeirasShow($termek)
    {
        return DB::table('termek_jellemzos as tj')
                    ->select('td.mertekegyseg','tj.ertek')
                    ->join('termeks as tk','tk.ter_id','=','tj.Termek')
                    ->join('tulajdonsags as td','td.tul_id','=','tj.Tulajdonsag')
                    ->where('tk.ter_id','=',$termek)
                    ->get();
    }

    public function MenedzserFelhasznaloEgy(Request $request, $id)
    {
        //Felhasználó lekérés egy
        $user = User::find($id);
        return $user;
    }
    public function rendeleShow()
    {
       
        return DB::table('rendeles as rs')
        ->select('*')

        ->get();
    }
    public function rendelesTabla($rend_id)
    {
        return DB::table('rend_tetels as rt')
        ->select('rt.Termek','rt.menny','rt.ar', 'ts.elnevezes', 'ts.marka', 'ts.keszlet' )
        ->join('termeks as ts','ts.ter_id' ,'rt.Termek')
        ->where('rt.rend_szam', '=', $rend_id)
        ->get();
    }
    public function rTablaLiras($id){

        return DB::table('termek_jellemzos as tr')
        ->select('tr.Termek','tr.ertek','tg.elnevezes','tg.mertekegyseg')
        ->join('tulajdonsags as tg', 'tr.Tulajdonsag', 'tg.tul_id')
        ->where('tr.Termek', '=', $id)
        ->get();
    }
    public function rendelTetelfind(Request $request,$rend_szam)
    {
        $rend_tetel = DB::table('rendeles')
                        ->select('t.marka', 't.elnevezes', 't.keszlet', 'rt.menny', 'rt.ar')
                        ->join('rend_tetels as rt', 'rt.rend_szam', '=', 'rendeles.rend_szam')
                        ->join('termeks as t', 'rt.Termek', '=', 't.ter_id')
                        ->where('rendeles.rend_szam', $rend_szam)
                        ->get();
        
        return $rend_tetel;
    }
    public function ShowTermek() {
        $lending = Termek::all();
        return $lending;
    }
    public function TermekM(Request $request, $Termekszam)
    {
        //Termek módositása felvitel 
        $Termek = Termek::find($Termekszam);
        
        // Ellenőrzés, hogy a beérkező adatok üresek-e
        if (!empty($request->elnevezes)) {
            $Termek->elnevezes = $request->json('elnevezes');
        }
    
        if (!empty($request->marka)) {
            $Termek->marka = $request->json('marka');
        }
    
        if (!empty($request->keszlet)) {
            $Termek->keszlet = $request->json('keszlet');
        }
    
        if (!empty($request->eladasi_ar)) {
            $Termek->eladasi_ar = $request->json('eladasi_ar');
        }
    
        $Termek->save();
        return response()->json(['success' => true]);
    }
    public function newTermek(Request $request)
    {
        //Új Termek felvitel 
        try {
            $Termek = new Termek();
            $Termek->elnevezes = $request->elnevezes;
            $Termek->Alketegoria  = $request->Alketegoria ;
            $Termek->marka = $request->marka;
            $Termek->keszlet = $request->keszlet;
            $Termek->eladasi_ar = $request->eladasi_ar;
            $Termek->save();
        } catch (QueryException $e) {
            // Ha kivétel történik (például az egyediségi megsértése)
            if ($e->errorInfo[1] == 1062) { // 1062 az egyediségi megsértés hibakódja MySQL-ben 
                echo "A rekord már létezik a táblában.";
            } else {
                // Más típusú kivétel esetén kezelheted őket itt 
                echo "Hiba történt: " . $e->getMessage();
            }
        }
    }

    public function TermekkepN(Request $request)
    {
        $kep = new KepModel();
        $kep->Termekszam = $request->Termekszam;
        $kep->URL = $request->URL;
        $kep->save();
    }
    public function TermekkepM(Request $request, $Termekszam)
    {
        $kep = KepModel::find($Termekszam);
        $kep->Termekszam = $request->Termekszam;
        $kep->URL = $request->URL;
        $kep->save();
    }


    public function show($rend_id, $Termek)
    {
        $lending = Rend_tetel::where('rend_id', $rend_id)->where('Termek', $Termek)->get();
        return $lending[0];
    }

    public function rendelesA(Request $request,$rend_id,$Termek)
    {
        $rendeles2 = Rendeles::show($rend_id,$Termek);
        $rendeles2->allapot = $request->allapot;
        $rendeles2->save();
    }


}

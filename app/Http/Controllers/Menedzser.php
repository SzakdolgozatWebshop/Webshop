<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Kategoria;
use App\Models\KategoriaModel;
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
    public function MenedzserFelhasznaloEgy(Request $request, $id)
    {
        //Felhasználó lekérés egy
        $user = User::find($id);
        return $user;
    }
    public function rendeleShow()
    {
        $rendeles2 = Rendeles::all();
        return $rendeles2;
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
            // Ha kivétel történik (például az egyediségi megsértése), akkor itt kezeld 
            if ($e->errorInfo[1] == 1062) { // 1062 az egyediségi megsértés hibakódja MySQL-ben 
                echo "A rekord már létezik a táblában.";
                //return redirect "/"; 
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
    public function TermekategoriN(Request $request)
    {
        $kateg = new Kategoria();
        $kateg->elnevezes = $request->elnevezes;
        $kateg->Fokategoria = $request->Fokategoria;
        $kateg->save();
    }
    public function TermekategoriM(Request $request,$kat_id)
    {
        $kateg = Kategoria::find($kat_id);
        $kateg->elnevezes = $request->elnevezes;
        $kateg->Fokategoria = $request->Fokategoria;
        $kateg->save();
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

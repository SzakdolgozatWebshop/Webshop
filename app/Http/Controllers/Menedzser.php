<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\KategoriaModel;
use App\Models\KepModel;
use App\Models\Keszlet;
use App\Models\LeirasModel;
use App\Models\Rend_tetel;
use App\Models\Rendeles;
use App\Models\Rendeles2;
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
    public function ShowTermek() {
        $lending = Termek::all();
        return $lending;
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
    public function modTermek(Request $request, $Termekszam)
    {
        //Termek módositása felvitel 
        $Termek = Termek::find($Termekszam);
        $Termek->elnevezes = $request->elnevezes;
        $Termek->Alketegoria  = $request->Alketegoria ;
        $Termek->marka = $request->marka;
        $Termek->keszlet = $request->keszlet;
        $Termek->eladasi_ar = $request->eladasi_ar;
        $Termek->save();
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
    public function TermekleirasN(Request $request)
    {
        $leiras = new LeirasModel();
        $leiras->Termekszam = $request->Termekszam;
        $leiras->leirasText = $request->leirasText;
        $leiras->Mnev = $request->Mnev;
        $leiras->Anev = $request->Anev;
        $leiras->save();
    }
    public function TermekleirasM(Request $request,$Termekszam)
    {
        $leiras =LeirasModel::find($Termekszam);
        $leiras->Termekszam = $request->Termekszam;
        $leiras->leirasText = $request->leirasText;
        $leiras->Mnev = $request->Mnev;
        $leiras->Anev = $request->Anev;
        $leiras->save();
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

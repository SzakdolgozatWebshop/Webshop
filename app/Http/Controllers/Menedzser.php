<?php

namespace App\Http\Controllers;

use App\Models\CikkModel;
use App\Models\KategoriaModel;
use App\Models\KepModel;
use App\Models\Keszlet;
use App\Models\LeirasModel;
use App\Models\Rendeles;
use App\Models\Rendeles2;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function newCikk(Request $request)
    {
        //Új cikk felvitel 
        try {
            $cikk = new CikkModel();
            $cikk->marka = $request->marka;
            $cikk->kategoria = $request->kategoria;
            $cikk->megnevM = $request->megnevM;
            $cikk->megnevA = $request->megnevA;
            $cikk->eladasAr = $request->eladasAr;
            $cikk->opcio = $request->opcio;
            $cikk->save();
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
    public function modCikk(Request $request, $cikkszam)
    {
        //Cikk módositása felvitel 
        $cikk = CikkModel::find($cikkszam);
        $cikk->marka = $request->marka;
        $cikk->kategoria = $request->kategoria;
        $cikk->megnevM = $request->megnevM;
        $cikk->megnevA = $request->megnevA;
        $cikk->eladasAr = $request->eladasAr;
        $cikk->opcio = $request->opcio;
        $cikk->save();
    }
    public function cikkkepN(Request $request)
    {
        $kep = new KepModel();
        $kep->cikkszam = $request->cikkszam;
        $kep->URL = $request->URL;
        $kep->save();
    }
    public function cikkkepM(Request $request, $cikkszam)
    {
        $kep = KepModel::find($cikkszam);
        $kep->cikkszam = $request->cikkszam;
        $kep->URL = $request->URL;
        $kep->save();
    }
    public function cikkleirasN(Request $request)
    {
        $leiras = new LeirasModel();
        $leiras->cikkszam = $request->cikkszam;
        $leiras->leirasText = $request->leirasText;
        $leiras->Mnev = $request->Mnev;
        $leiras->Anev = $request->Anev;
        $leiras->save();
    }
    public function cikkleirasM(Request $request,$cikkszam)
    {
        $leiras =LeirasModel::find($cikkszam);
        $leiras->cikkszam = $request->cikkszam;
        $leiras->leirasText = $request->leirasText;
        $leiras->Mnev = $request->Mnev;
        $leiras->Anev = $request->Anev;
        $leiras->save();
    }
    public function cikkategoriN(Request $request)
    {
        $kateg = new KategoriaModel();
        $kateg->Mnev = $request->Mnev;
        $kateg->Anev = $request->Anev;
        $kateg->save();
    }
    public function cikkategoriM(Request $request,$kat_id)
    {
        $kateg = KategoriaModel::find($kat_id);
        $kateg->Mnev = $request->Mnev;
        $kateg->Anev = $request->Anev;
        $kateg->save();
    }
    public function keszletN(Request $request)
    {
        $kateg = new Keszlet();
        $kateg->cikkszam = $request->cikkszam;
        $kateg->menny = $request->menny;
        $kateg->save();
    }
    public function keszletM(Request $request,$cikkszam)
    {
        $kateg = Keszlet::find($cikkszam);
        $kateg->cikkszam = $request->cikkszam;
        $kateg->menny = $request->menny;
        $kateg->save();
    }
    public function show($rend_id, $cikkszam)
    {
        $lending = Rendeles2::where('rend_id', $rend_id)->where('cikkszam', $cikkszam)->get();
        return $lending[0];
    }

    public function rendelesA(Request $request,$rend_id,$cikkszam)
    {
        $rendeles2 = Rendeles::show($rend_id,$cikkszam);
        $rendeles2->allapot = $request->allapot;
        $rendeles2->save();
    }

}

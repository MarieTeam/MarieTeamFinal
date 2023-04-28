<?php

namespace App\Http\Controllers;


use App\Models\Bateau;
use App\Models\Port;
use Illuminate\Support\Facades\DB;

Class Horaire extends Controller
{
    public function _construct()
    {
        $this->middleware('guest');
    }

    private function getHoraire($ville)
    {
        $horaires = DB::table('Traversee as T')
            ->select('P1.nom as nom_port1', 'P2.nom as nom_port2')
            ->distinct()
            ->join('Liaison as L', 'L.code', '=', 'T.code_liaison')
            ->join('Port as P1', 'P1.id', '=', 'L.id_port1')
            ->join('Port as P2', 'P2.id', '=', 'L.id_port2')
            ->where('P1.nom', '=',"$ville")
            ->get();
        return $horaires;
    }

    public function getallHoraire()
    {
        $villes = DB::table('Port')->pluck('nom');
        $horaires = [];
        foreach ($villes as $ville) {
            $horaire = $this->getHoraire($ville);
            $horaires[$ville] = $horaire;
        }

        return view('horaire')->with('horaires', $horaires);
    }
}

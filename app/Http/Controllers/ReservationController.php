<?php

namespace App\Http\Controllers;
use App\Models\Port;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bateau;
use Reservation;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $port_depart = $request->input('selectDepart');
        $port_arrivee = $request->input('selectArrivee');
        $compteur = 0;

        return view('reservation' , [
            'port_depart' => $port_depart,
            'port_arrivee' => $port_arrivee,
            'compteur' => $compteur,
        ]);
    }

    public function getAvailableBoats(Request $request)
    {
        $departure_date = $request->input('departure_date');
        $portDepart = $request->input('departure_port');
        $portArriver = $request->input('arrival_port');


        $reservations = DB::table('Traversee')
            ->select('Traversee.*', 'Port1.nom as port_depart', 'Port2.nom as port_arrivee', 'Bateau.nom as bateau', 'traversee.heure as heure')
            ->join('Liaison', 'Traversee.code_liaison', '=', 'Liaison.code')
            ->join('Port as Port1', 'Liaison.id_port1', '=', 'Port1.id')
            ->join('Port as Port2', 'Liaison.id_port2', '=', 'Port2.id')
            ->join('Bateau', 'Traversee.id_bateau', '=', 'Bateau.id')
            ->where('Port1.nom', '=', (string)$portDepart)
            ->where('Port2.nom', '=', (string)$portArriver)
            ->where('traversee.datee','=',$departure_date)
            ->get();

        return response()->json($reservations);
    }

    public function updateAjax(Request $request)
    {
        $compteur = $request->input('compteur');

        if ($request->input('action') == '+') {
            $compteur++;
        } else {
            $compteur--;
        }


        return response()->json(['compteur' => $compteur]);
    }



}


<?php

namespace App\Http\Controllers;
use App\Models\Enregistrer;
use App\Models\Personne;
use App\Models\Port;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bateau;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;

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
            ->select('Traversee.*', 'Port1.nom as port_depart', 'Port2.nom as port_arrivee', 'Bateau.nom as bateau', 'traversee.heure as heure', 'traversee.num as id')
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


    public function store(Request $request)
    {
        // Build the people array from the request data
        $people = [];
        $numPeople = $request->input('num_people');
        for ($i = 1; $i <= $numPeople; $i++) {
            $people[] = [
                'name' => $request->input("person_{$i}_name"),
                'type' => $request->input("person_{$i}_type"),
                'address' => $request->input("person_{$i}_address"),
                'zip' => $request->input("person_{$i}_zip"),
                'city' => $request->input("person_{$i}_city"),
            ];
        }

        // Replace the old people array in the request with the new one
        $request->merge(['people' => $people]);

        // Validate the request data
        $request->validate([
            'reservation_nom' => 'required|string',
            'reservation_adresse' => 'required|string',
            'reservation_codepostal' => 'required|string',
            'reservation_ville' => 'required|string',
            'boat_id' => 'required|integer',
            'people.*.name' => 'required|string',
            'people.*.type' => 'required|string|exists:type,libelle',
            'people.*.address' => 'required|string',
            'people.*.zip' => 'required|string',
            'people.*.city' => 'required|string',
        ]);

        // Create a new reservation
        $reservation = new Reservation;
        $reservation->nom = $request->reservation_nom;
        $reservation->adresse = $request->reservation_adresse;
        $reservation->codePostal = $request->reservation_codepostal;
        $reservation->ville = $request->reservation_ville;
        $reservation->num_traversee = $request->boat_id;
        $reservation->save();

        Log::info('People: ' . print_r($people, true));
        // Register each person
        foreach ($people as $person) {
            $typeLibelle = $person['type'];
            $type = Type::where('libelle', $typeLibelle)->first();

            $personModel = new Personne;
            $personModel->nom = $person['name'];
            $personModel->addresse = $person['address'];
            $personModel->code_postal = $person['zip'];
            $personModel->ville = $person['city'];
            $personModel->type_id = $type->id;
            $personModel->save();


            // Register the number of people of this type to the reservation...
            $enregistrement = new Enregistrer;
            $enregistrement->lettre_type = $type->lettre;
            $enregistrement->num_type = $type->num;
            $enregistrement->num_reservation = $reservation->id;
            $enregistrement->quantite = count($people);
            $enregistrement->save();

        }

        // Redirect to a success page
        return redirect()->route('reservations.success');
    }


    public function showSuccess()
    {
        return view('recap');
    }


}


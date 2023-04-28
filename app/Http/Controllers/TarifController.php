<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TarifController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function viewTarif()
    {
        $types = DB::select('SELECT * FROM `Categorie`');

        $tarifsEte = DB::table('Tarifer')
        ->select('Tarifer.tarif', 'Type.libelle', 'Tarifer.lettre_type', 'Tarifer.num_type')
        ->join('Type', 'Type.num', '=', 'Tarifer.num_type')
        ->where('Tarifer.date_deb', '=', '01/06')
        ->where('Type.lettre', '=', DB::raw('Tarifer.lettre_type'))
        ->distinct()
        ->get();

        $tarifsHiver = DB::table('Tarifer')
        ->select('Tarifer.tarif', 'Type.libelle', 'Tarifer.lettre_type', 'Tarifer.num_type')
        ->join('Type', 'Type.num', '=', 'Tarifer.num_type')
        ->where('Tarifer.date_deb', '=', '01/10')
        ->where('Type.lettre', '=', DB::raw('Tarifer.lettre_type'))
        ->distinct()
        ->get();

        return view('tarifs')->with('TarifsEte', $tarifsEte)->with('tarifsHiver', $tarifsHiver)->with('types', $types);
    }

}

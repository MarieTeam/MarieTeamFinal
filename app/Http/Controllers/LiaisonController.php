<?php

namespace App\Http\Controllers;

use App\Models\Bateau;
use App\Models\Liaison;
use App\Models\Port;
use App\Models\Secteur;
use Illuminate\Http\Request;

class LiaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secteurs = Secteur::all();
        $bateaux = Bateau::all();
        $liaisons = Liaison::all();
        $ports = Port::all();
        return view('admin.liaisons', ['liaisons' => $liaisons, 'ports' => $ports, 'bateaux'=>$bateaux, 'secteurs' => $secteurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.liaisons');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'distance' => 'required|max:255',
            'id_secteur' => 'required|max:2',
            'id_port1' => 'required|max:2',
            'id_port2' => 'required|max:2',
            'id_bateau' => 'required|max:2',
        ]);
        Liaison::create($request->all());

        return redirect()->route('liaisons.index')->with('success', 'La liaison a été ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Liaison $liaison)
    {
        return view('admin.liaisonsEdit', compact('liaison'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Liaison $liaison)
    {
        $request->validate([
            'distance' => 'required|max:255',
            'id_secteur' => 'required|max:2',
            'id_port1' => 'required|max:2',
            'id_port2' => 'required|max:2',
            'id_bateau' => 'required|max:2',
        ]);
        $liaison->update($request->all());
        return redirect()->route('liaisons.index')->with('success', 'La liaison a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Liaison $liaison)
    {
        $liaison->delete();
        return redirect()->route('liaisons.index')->with('success', 'La liaisons a été supprimé avec succès.');
    }
}

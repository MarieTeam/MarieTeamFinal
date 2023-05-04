<?php

namespace App\Http\Controllers;

use App\Models\Bateau;
use Illuminate\Http\Request;

class BateauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bateaux = Bateau::all();
        return view('admin.bateaux', compact('bateaux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bateaux');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
        ]);

        Bateau::create($request->all());

        return redirect()->route('bateaux.index')->with('success', 'Le bateau a été ajouté avec succès.');
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
    public function edit(Bateau $bateau)
    {
        return view('admin.bateauxEdit', compact('bateau'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bateau $bateau)
    {

        $request->validate([
            'nom' => 'required|max:255',
        ]);
        $bateau->update($request->all());
        return redirect()->route('bateaux.index')->with('success', 'Le bateau a été mis à jour avec succès.');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bateau $bateau)
    {
        $bateau->delete();
        return redirect()->route('bateaux.index')->with('success', 'Le bateau a été supprimé avec succès.');
    }
}

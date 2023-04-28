<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecapitulatifController extends Controller
{
    public function index()
    {
        return view('Recap');
    }

    public function updateAjax(Request $request)
    {
        $compteur = $request->input('compteur');

        if ($request->input('action') == '+') {
            $compteur++;
        } else {
            $compteur--;
        }

        return response()->json(['Recap' => $compteur]);
    }

}

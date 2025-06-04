<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOffreController extends Controller
{
    public function index()
{
    $offres = Offre::all();
    $vehicules = Vehicule::all();
    return view('admin.adminOffres', compact('offres', 'vehicules'));
}

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'desponibilite' => 'required',
            'reduction' => 'required|numeric'
        ]);

        Offre::create([
            'description' => $request->description,
            'desponibilite' => $request->desponibilite,
            'reduction' => $request->reduction,
            'admin_id' => 1, // temp : à remplacer selon ton admin connecté
        ]);

        return redirect()->back()->with('success', 'Offre ajoutée.');
    }

    public function update(Request $request, $id)
{
    $offre = Offre::findOrFail($id);
    $offre->update([
        'description' => $request->description,
        'desponibilite' => $request->desponibilite,
        'reduction' => $request->reduction
    ]);

    return redirect()->route('offres.index')->with('success', 'Offre modifiée.');
}

public function edit($id)
{
    $offre = Offre::findOrFail($id);
    $offres = Offre::all();
    $vehicules = Vehicule::all();

    return view('admin.adminOffres', [
        'offre' => $offre,
        'offres' => $offres,
        'vehicules' => $vehicules,
        'editMode' => true
    ]);
}

    public function destroy($id)
    {
        Offre::destroy($id);
        return redirect()->back()->with('success', 'Offre supprimée.');
    }
}

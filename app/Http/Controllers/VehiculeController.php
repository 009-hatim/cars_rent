<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('admin.adminCars', compact('vehicules'));
    }


    public function publicIndex()
    {
        $vehicules = Vehicule::where('disponibilite', true)->get();
        return view('index', compact('vehicules'));
    }

    public function create()
    {
        return view('admin.vehicules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required',
            'capacite' => 'required|integer',
            'tarif' => 'required|numeric',
            'marque' => 'required',
            'type_carburant' => 'required',
            'annee' => 'required|integer',
            'transmission' => 'required',
            'kilometrage' => 'required|integer',
            'etoiles' => 'required|integer',
            'disponibilite' => 'required|boolean',
            'admin_id' => 'required|exists:admins,id',
            'options' => 'nullable|string',
        ]);


        Vehicule::create($validated);
        return redirect()->route('admin.cars')->with('success', 'Véhicule ajouté.');
    }

    public function edit($id)
    {
        $vehicules = Vehicule::all();
        $vehicule = Vehicule::findOrFail($id);
        $editMode = true;

        return view('admin.adminCars', compact('vehicules', 'vehicule', 'editMode'));
    }


    public function update(Request $request, $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->update($request->all());
        return redirect()->route('admin.cars')->with('success', 'Véhicule modifié.');
    }

    public function destroy($id)
    {
        Vehicule::destroy($id);
        return redirect()->route('admin.cars')->with('success', 'Véhicule supprimé.');
    }
}

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

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'tarif' => 'required|numeric|min:0',
            'options' => 'nullable|string',
            'disponibilite' => 'boolean'
        ]);

        $vehicule = Vehicule::create([
            'marque' => $request->marque,
            'model' => $request->model,
            'capacite' => $request->capacite,
            'tarif' => $request->tarif,
            'options' => $request->options,
            'disponibilite' => $request->disponibilite ?? true,
            'admin_id' => auth()->user()->admin->id
        ]);

        return redirect()->route('vehicules.index')->with('success', 'Vehicle added successfully!');
    }

    public function show(Vehicule $vehicule)
    {
        return view('admin.vehicule-details', compact('vehicule'));
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'marque' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'tarif' => 'required|numeric|min:0',
            'options' => 'nullable|string',
            'disponibilite' => 'boolean'
        ]);

        $vehicule->update([
            'marque' => $request->marque,
            'model' => $request->model,
            'capacite' => $request->capacite,
            'tarif' => $request->tarif,
            'options' => $request->options,
            'disponibilite' => $request->disponibilite ?? true
        ]);

        return redirect()->route('vehicules.index')->with('success', 'Vehicle updated successfully!');
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return redirect()->route('vehicules.index')->with('success', 'Vehicle deleted successfully!');
    }

    public function toggleAvailability(Vehicule $vehicule, Request $request)
    {
        $request->validate([
            'disponibilite' => 'required|boolean'
        ]);

        $vehicule->update([
            'disponibilite' => $request->disponibilite
        ]);

        return response()->json(['success' => true]);
    }
}

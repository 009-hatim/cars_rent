<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    // Display all reservations
    public function index()
{
    $reservations = Reservation::with('client', 'vehicule')->get();
    $clients = Client::all();
    $vehicules = Vehicule::all();
    return view('admin.adminReservation', compact('reservations', 'clients', 'vehicules'));
}


    // Show the form for creating a new reservation
    public function create()
    {
        $clients = Client::all();
        $vehicules = Vehicule::all();
        return view('admin.reservationCreate', compact('clients', 'vehicules'));
    }

    // Store a newly created reservation in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'vehicule_id' => 'required|exists:vehicules,id',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|in:en_attente,confirmee,annulee',
        ]);

        Reservation::create($validated);

        return redirect()->route('admin.reservations.index')->with('success', 'Réservation ajoutée avec succès.');
    }

    // Show the form for editing a reservation
    public function edit(Reservation $reservation)
{
    $reservations = Reservation::with('client', 'vehicule')->get();
    $clients = Client::all();
    $vehicules = Vehicule::all();
    return view('admin.adminReservation', [
        'edit' => true,
        'reservation' => $reservation,
        'clients' => $clients,
        'vehicules' => $vehicules,
        'reservations' => $reservations
    ]);
}


    // Update an existing reservation in the database
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'vehicule_id' => 'required|exists:vehicules,id',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|in:en_attente,confirmee,annulee',
        ]);

        $reservation->update($validated);

        return redirect()->route('admin.reservations.index')->with('success', 'Réservation mise à jour.');
    }

    // Delete a reservation from the database
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Réservation supprimée.');
    }
}

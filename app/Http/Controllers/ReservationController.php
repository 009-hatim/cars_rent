<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Reservation;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $vehicules = Vehicule::where('disponibilite', true)->get();
        $offre = Offre::where('desponibilite', 'oui')->first();


        return view('reservations.create', compact('vehicules', 'offre'));
    }




    public function createWithVehicle(Vehicule $vehicule)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        if (!$user->client) {
            return redirect()->back()->with('error', 'Vous devez compléter votre profil client avant de réserver.');
        }

        $vehicules = Vehicule::where('disponibilite', true)->get();
        $offre = Offre::where('desponibilite', 'oui')->first();


        return view('index', compact('vehicules', 'selectedVehicule', 'offre'));
    }


    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!$user->client) {
            return redirect()->back()->with('error', 'Client profile incomplete');
        }


        $validated = $request->validate([
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
            'permis_front' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'permis_back' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'vehicule_id' => [
                'required',
                'exists:vehicules,id',
                function ($attribute, $value, $fail) use ($request) {
                    $overlapping = Reservation::where('vehicule_id', $value)
                        ->where(function ($query) use ($request) {
                            $query->whereBetween('dateDebut', [$request->dateDebut, $request->dateFin])
                                ->orWhereBetween('dateFin', [$request->dateDebut, $request->dateFin])
                                ->orWhere(function ($query) use ($request) {
                                    $query->where('dateDebut', '<', $request->dateDebut)
                                        ->where('dateFin', '>', $request->dateFin);
                                });
                        })
                        ->whereIn('statut', ['en_attente', 'confirmee'])
                        ->exists();

                    if ($overlapping) {
                        $fail('Ce véhicule n\'est pas disponible pour les dates sélectionnées.');
                    }
                }
            ],
        ]);

        try {
            $client = $user->client;
            $clientName = preg_replace('/\s+/', '_', strtolower($client->nom));

            // Create custom file names
            $frontFile = $client->id . '_' . $clientName . '_recto.' . $request->file('permis_front')->getClientOriginalExtension();
            $backFile = $client->id . '_' . $clientName . '_verso.' . $request->file('permis_back')->getClientOriginalExtension();

            // Store files
            $frontPath = $request->file('permis_front')->storeAs('permis', $frontFile, 'public');
            $backPath = $request->file('permis_back')->storeAs('permis', $backFile, 'public');

            $offre = Offre::where('desponibilite', 'oui')->first();


            $reservation = Reservation::create([
                'dateDebut' => $validated['dateDebut'],
                'dateFin' => $validated['dateFin'],
                'permis_front_path' => $frontPath,
                'permis_back_path' => $backPath,
                'vehicule_id' => $validated['vehicule_id'],
                'client_id' => $client->id,
                'statut' => 'en_attente',
                'offre_id' => $offre?->id, // Peut être null si aucune offre active
            ]);


            return redirect()->route('reservation.show', $reservation->id)
                ->with('success', 'Réservation créée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors de la création de la réservation: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function show($id)
    {
        $reservation = Reservation::with(['vehicule', 'client', 'offre'])->findOrFail($id);


        // Calculate total
        $start = \Carbon\Carbon::parse($reservation->dateDebut);
        $end = \Carbon\Carbon::parse($reservation->dateFin);
        $days = $start->diffInDays($end) + 1;
        $tarif = $reservation->vehicule->tarif;
        $offre = $reservation->offre;
        if ($offre && $offre->desponibilite === 'oui') {
            $tarif -= ($tarif * $offre->reduction / 100);
        }


        $total = $tarif * $days;


        return view('reservations.show', compact('reservation', 'total'));
    }

    public function downloadPDF($id)
    {
        $reservation = Reservation::with(['vehicule', 'client'])->findOrFail($id);

        $start = \Carbon\Carbon::parse($reservation->dateDebut);
        $end = \Carbon\Carbon::parse($reservation->dateFin);
        $days = $start->diffInDays($end) + 1;
        $tarif = $reservation->vehicule->tarif;
        $offre = $reservation->offre;
        if ($offre && $offre->desponibilite === 'oui') {
            $tarif -= ($tarif * $offre->reduction / 100);
        }


        $total = $tarif * $days;


        $pdf = Pdf::loadView('pdf.reservation', compact('reservation', 'days', 'total'));
        return $pdf->download('reservation_' . $reservation->id . '.pdf');
    }
}

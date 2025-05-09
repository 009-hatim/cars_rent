<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // In your AdminController.php
public function dashboard()
{
    $stats = [
        'totalVehicles' => Vehicule::count(),
        'availableVehicles' => Vehicule::where('disponibilite', true)->count(),
        'totalReservations' => Reservation::count(),
        'pendingReservations' => Reservation::where('statut', 'en_attente')->count(),
        'totalClients' => Client::count(),
        'newClientsThisMonth' => Client::whereMonth('created_at', now()->month)->count(),
        'totalReviews' => Avis::count(),
        'averageRating' => number_format(Avis::avg('note') ?? 0, 1),
    ];

    $recentReservations = Reservation::with(['client', 'vehicule'])
        ->latest()
        ->take(5)
        ->get();

    $recentReviews = Avis::with('client.user')
        ->latest()
        ->take(3)
        ->get();

    return view('admin.dashboard', compact('stats', 'recentReservations', 'recentReviews'));
}
}

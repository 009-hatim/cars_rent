@extends('admin.admin')
@section('title', 'Tableau de bord')

@section('styles')
<style>
    /* Remove all default margins and padding */
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
    }

    /* Make the container fluid and full width */
    .container-fluid-full {
        width: 100%;
        max-width: 100%;
        padding-left: 0;
        padding-right: 0;
        margin-left: 0;
        margin-right: 0;
    }

    /* Adjust the page header */
    .page-header {
        width: 100%;
        padding: 1rem 1.5rem;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e3e6f0;
        margin-left: 0;
        margin-right: 0;
    }

    /* Remove any horizontal padding from the main content */
    .main-content {
        padding-left: 0;
        padding-right: 0;
    }

    /* Ensure the dashboard content takes full width */
    .dashboard-content {
        padding: 0 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid-full px-0 mx-0">
    <div class="page-header">
        <h1>Tableau de bord</h1>
        <div class="text-muted small">
            <i class="far fa-calendar-alt me-1"></i>{{ now()->format('d/m/Y') }}
        </div>
    </div>

    <div class="row g-4 m-0">
        <!-- Vehicles Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Véhicules</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['totalVehicles'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <span class="badge bg-primary bg-opacity-10 text-primary">
                            {{ $stats['availableVehicles'] }} disponibles
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservations Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Réservations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['totalReservations'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <span class="badge bg-warning bg-opacity-10 text-warning">
                            {{ $stats['pendingReservations'] }} en attente
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Clients Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['totalClients'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <span class="badge bg-info bg-opacity-10 text-info">
                            {{ $stats['newClientsThisMonth'] }} nouveaux
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reviews Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Avis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['totalReviews'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <span class="badge bg-warning bg-opacity-10 text-warning">
                            Moyenne: {{ $stats['averageRating'] }}/5
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 m-0">
        <!-- Recent Reservations -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Réservations récentes</h6>
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-sm btn-primary">
                        Voir tout <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Véhicule</th>
                                    <th>Dates</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentReservations as $reservation)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-2 bg-light-primary rounded-circle">
                                                {{ substr($reservation->client->nom_complet, 0, 1) }}
                                            </div>
                                            <div>{{ $reservation->client->nom_complet }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->model }}</td>
                                    <td>
                                        <div>{{ $reservation->dateDebut->format('d/m/Y') }}</div>
                                        <small class="text-muted">au {{ $reservation->dateFin->format('d/m/Y') }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $reservation->statut == 'confirmee' ? 'success' : ($reservation->statut == 'en_attente' ? 'warning' : 'danger') }}">
                                            {{ ucfirst(str_replace('_', ' ', $reservation->statut)) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-sm btn-primary" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Aucune réservation récente</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reviews -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Derniers avis</h6>
                </div>
                <div class="card-body">
                    @forelse($recentReviews as $review)
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex align-items-start">
                            <div class="avatar-sm me-3 bg-light-primary rounded-circle">
                                {{ substr($review->client->nom_complet, 0, 1) }}
                            </div>
                            <div>
                                <h6 class="mb-1">{{ $review->client->nom_complet }}</h6>
                                <div class="mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $review->note ? ' text-warning' : ' text-muted' }}"></i>
                                    @endfor
                                </div>
                                <p class="small text-muted mb-2">{{ Str::limit($review->commentaire, 80) }}</p>
                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4">
                        <i class="fas fa-star fa-2x text-muted mb-3"></i>
                        <p class="text-muted">Aucun avis récent</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

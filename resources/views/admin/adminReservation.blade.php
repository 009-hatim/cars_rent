@extends('admin.admin')

@section('title', 'Gestion des Réservations')

@section('content')
<div class="page-header">
    <h1>Gestion des Réservations</h1>
    <a href="{{ route('admin.reservations.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle me-1"></i> Nouvelle réservation
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ isset($edit) && $edit ? 'Modifier Réservation' : 'Ajouter Réservation' }}
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($edit) ? route('admin.reservations.update', $reservation->id) : route('admin.reservations.store') }}" method="POST">
                    @csrf
                    @if(isset($edit)) @method('PUT') @endif

                    <div class="mb-3">
                        <label for="client_id" class="form-label">Client</label>
                        <select id="client_id" name="client_id" class="form-select" required>
                            <option value="">-- Sélectionner un client --</option>
                            @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ (isset($reservation) && $reservation->client_id == $client->id) ? 'selected' : '' }}>
                                {{ $client->nom_complet }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="vehicule_id" class="form-label">Véhicule</label>
                        <select id="vehicule_id" name="vehicule_id" class="form-select" required>
                            <option value="">-- Sélectionner un véhicule --</option>
                            @foreach($vehicules as $vehicule)
                            <option value="{{ $vehicule->id }}" {{ (isset($reservation) && $reservation->vehicule_id == $vehicule->id) ? 'selected' : '' }}>
                                {{ $vehicule->marque }} {{ $vehicule->model }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dateDebut" class="form-label">Date début</label>
                            <input type="date" id="dateDebut" name="dateDebut" class="form-control"
                                value="{{ old('dateDebut', isset($reservation)) ? $reservation->dateDebut->format('Y-m-d') : '' }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dateFin" class="form-label">Date fin</label>
                            <input type="date" id="dateFin" name="dateFin" class="form-control"
                                value="{{ old('dateFin', isset($reservation)) ? $reservation->dateFin->format('Y-m-d') : '' }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut</label>
                        <select id="statut" name="statut" class="form-select" required>
                            <option value="en_attente" {{ (isset($reservation) && $reservation->statut == 'en_attente') ? 'selected' : '' }}>En attente</option>
                            <option value="confirmee" {{ (isset($reservation) && $reservation->statut == 'confirmee') ? 'selected' : '' }}>Confirmée</option>
                            <option value="annulee" {{ (isset($reservation) && $reservation->statut == 'annulee') ? 'selected' : '' }}>Annulée</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas {{ isset($edit) ? 'fa-save' : 'fa-plus-circle' }} me-1"></i>
                            {{ isset($edit) ? 'Mettre à jour' : 'Ajouter' }}
                        </button>
                        @if(isset($edit))
                        <a href="{{ route('admin.reservations.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Annuler
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Liste des réservations</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Véhicule</th>
                                <th>Dates</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->client->nom_complet }}</td>
                                <td>{{ $res->vehicule->marque }} {{ $res->vehicule->model }}</td>
                                <td>
                                    <div>{{ $res->dateDebut->format('d/m/Y') }}</div>
                                    <small class="text-muted">au {{ $res->dateFin->format('d/m/Y') }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $res->statut == 'confirmee' ? 'success' : ($res->statut == 'en_attente' ? 'warning' : 'danger') }}">
                                        {{ ucfirst(str_replace('_', ' ', $res->statut)) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.reservations.edit', $res->id) }}" class="btn btn-sm btn-warning" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.reservations.destroy', $res->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Supprimer cette réservation ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#permis-{{ $res->id }}" title="Voir permis">
                                            <i class="fas fa-id-card"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="collapse" id="permis-{{ $res->id }}">
                                <td colspan="6">
                                    <div class="card card-body border-0 shadow-none p-2">
                                        <h6 class="mb-3">Permis de conduire</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <strong>Recto:</strong>
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/' . $res->permis_front_path) }}" alt="Permis Recto" class="img-fluid rounded" style="max-height: 200px;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Verso:</strong>
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/' . $res->permis_back_path) }}" alt="Permis Verso" class="img-fluid rounded" style="max-height: 200px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

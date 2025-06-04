@extends('admin.admin')

@section('title', 'Gestion des Véhicules')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1>Gestion des Véhicules</h1>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('vehicle-form').reset()">
            <i class="fas fa-plus-circle me-1"></i> Nouveau véhicule
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="fas fa-exclamation-circle me-2"></i>
        <strong>Erreurs:</strong>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($editMode) && $editMode ? 'Modifier le Véhicule' : 'Ajouter un Véhicule' }}
                    </h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ isset($editMode) && $editMode ? route('admin.cars.update', $vehicule->id) : route('admin.cars.store') }}" id="vehicle-form">
                        @csrf
                        @if(isset($editMode) && $editMode)
                        @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="marque" class="form-label">Marque</label>
                                <input type="text" id="marque" name="marque" class="form-control" value="{{ $vehicule->marque ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="model" class="form-label">Modèle</label>
                                <input type="text" id="model" name="model" class="form-control" value="{{ $vehicule->model ?? '' }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="annee" class="form-label">Année</label>
                                <input type="number" id="annee" name="annee" class="form-control" value="{{ $vehicule->annee ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tarif" class="form-label">Tarif journalier (€)</label>
                                <input type="number" id="tarif" step="0.01" name="tarif" class="form-control" value="{{ $vehicule->tarif ?? '' }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="capacite" class="form-label">Capacité (personnes)</label>
                                <input type="number" id="capacite" name="capacite" class="form-control" value="{{ $vehicule->capacite ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_carburant" class="form-label">Type Carburant</label>
                                <select id="type_carburant" name="type_carburant" class="form-select" required>
                                    <option value="">-- Sélectionner --</option>
                                    <option value="essence" {{ (isset($vehicule) && $vehicule->type_carburant == 'essence') ? 'selected' : '' }}>Essence</option>
                                    <option value="diesel" {{ (isset($vehicule) && $vehicule->type_carburant == 'diesel') ? 'selected' : '' }}>Diesel</option>
                                    <option value="electrique" {{ (isset($vehicule) && $vehicule->type_carburant == 'electrique') ? 'selected' : '' }}>Électrique</option>
                                    <option value="hybride" {{ (isset($vehicule) && $vehicule->type_carburant == 'hybride') ? 'selected' : '' }}>Hybride</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="transmission" class="form-label">Transmission</label>
                                <select id="transmission" name="transmission" class="form-select" required>
                                    <option value="">-- Sélectionner --</option>
                                    <option value="automatique" {{ (isset($vehicule) && $vehicule->transmission == 'automatique') ? 'selected' : '' }}>Automatique</option>
                                    <option value="manuelle" {{ (isset($vehicule) && $vehicule->transmission == 'manuelle') ? 'selected' : '' }}>Manuelle</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kilometrage" class="form-label">Kilométrage</label>
                                <input type="number" id="kilometrage" name="kilometrage" class="form-control" value="{{ $vehicule->kilometrage ?? '' }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="etoiles" class="form-label">Étoiles (1-5)</label>
                                <input type="number" id="etoiles" name="etoiles" min="1" max="5" class="form-control" value="{{ $vehicule->etoiles ?? 4 }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="disponibilite" class="form-label">Disponibilité</label>
                                <select id="disponibilite" name="disponibilite" class="form-select">
                                    <option value="1" {{ (isset($vehicule) && $vehicule->disponibilite) ? 'selected' : '' }}>Disponible</option>
                                    <option value="0" {{ (isset($vehicule) && !$vehicule->disponibilite) ? 'selected' : '' }}>Indisponible</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="options" class="form-label">Options</label>
                            <textarea id="options" name="options" class="form-control" rows="3" placeholder="GPS, Bluetooth, Climatisation, etc.">{{ $vehicule->options ?? '' }}</textarea>
                        </div>

                        <input type="hidden" name="admin_id" value="{{ auth()->id() }}">

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas {{ isset($editMode) ? 'fa-save' : 'fa-plus-circle' }} me-1"></i>
                                {{ isset($editMode) && $editMode ? 'Mettre à jour' : 'Ajouter' }}
                            </button>
                            @if(isset($editMode))
                            <a href="{{ route('admin.cars') }}" class="btn btn-secondary">
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
                    <h6 class="m-0 font-weight-bold text-primary">Liste des véhicules</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Véhicule</th>
                                    <th>Année</th>
                                    <th>Tarif</th>
                                    <th>Disponibilité</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicules as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3 bg-light-primary rounded-circle">
                                                <i class="fas fa-car"></i>
                                            </div>
                                            <div>
                                                <strong>{{ $v->marque }} {{ $v->model }}</strong>
                                                <div class="small text-muted">{{ $v->capacite }} places • {{ ucfirst($v->transmission) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $v->annee }}</td>
                                    <td>{{ $v->tarif }} €/jour</td>
                                    <td>
                                        @if($v->disponibilite)
                                        <span class="badge bg-success">Disponible</span>
                                        @else
                                        <span class="badge bg-danger">Indisponible</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.cars.edit', $v->id) }}" class="btn btn-sm btn-warning" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.cars.destroy', $v->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Confirmer la suppression ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
</div>
@endsection

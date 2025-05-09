@extends('admin.admin')

@section('title', 'Gestion des Offres')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1>Gestion des Offres</h1>
        <a href="{{ route('offres.store') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Nouvelle offre
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
                        {{ isset($editMode) ? 'Modifier l\'offre' : 'Ajouter une offre' }}
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($editMode) ? route('offres.update', $offre->id) : route('offres.store') }}" method="POST">
                        @csrf
                        @if(isset($editMode))
                        @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" name="description" class="form-control" placeholder="Description de l'offre"
                                value="{{ old('description', $offre->description ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="desponibilite" class="form-label">Disponibilité</label>
                            <select id="desponibilite" name="desponibilite" class="form-select" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="oui" {{ old('desponibilite', $offre->desponibilite ?? '') == 'oui' ? 'selected' : '' }}>Oui</option>
                                <option value="non" {{ old('desponibilite', $offre->desponibilite ?? '') == 'non' ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="reduction" class="form-label">Réduction (%)</label>
                            <input type="number" id="reduction" name="reduction" class="form-control" placeholder="Ex: 10"
                                value="{{ old('reduction', $offre->reduction ?? '') }}" min="1" max="100" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas {{ isset($editMode) ? 'fa-save' : 'fa-plus-circle' }} me-1"></i>
                                {{ isset($editMode) ? 'Modifier' : 'Ajouter' }}
                            </button>
                            @if(isset($editMode))
                            <a href="{{ route('offres.index') }}" class="btn btn-secondary">
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
                    <h6 class="m-0 font-weight-bold text-primary">Liste des offres</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Disponibilité</th>
                                    <th>Réduction</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offres as $offre)
                                <tr>
                                    <td>{{ $offre->id }}</td>
                                    <td>{{ $offre->description }}</td>
                                    <td>
                                        @if($offre->desponibilite == 'oui')
                                        <span class="badge bg-success">Disponible</span>
                                        @else
                                        <span class="badge bg-danger">Indisponible</span>
                                        @endif
                                    </td>
                                    <td>{{ $offre->reduction }}%</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('offres.edit', $offre->id) }}" class="btn btn-sm btn-warning" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Supprimer cette offre ?')">
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

@extends('admin.admin')

@section('title', 'Gestion des Clients')

@section('content')
<div class="page-header">
    <h1>Gestion des Clients</h1>
    <a href="{{ route('admin.clients.store') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle me-1"></i> Nouveau client
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
                    {{ isset($editMode) && $editMode ? 'Modifier Client' : 'Ajouter un Client' }}
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ isset($editMode) && $editMode ? route('admin.clients.update', $client->id) : route('admin.clients.store') }}">
                    @csrf
                    @if(isset($editMode) && $editMode)
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value="{{ old('nom', $client->user->nom ?? '') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" value="{{ old('prenom', $client->user->prenom ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $client->user->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tel" class="form-label">Téléphone</label>
                        <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone" value="{{ old('tel', $client->tel ?? '') }}" required>
                    </div>

                    @if(!isset($editMode))
                    <div class="mb-3">
                        <label for="MotDePasse" class="form-label">Mot de passe</label>
                        <input type="password" id="MotDePasse" name="MotDePasse" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    @endif

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas {{ isset($editMode) ? 'fa-save' : 'fa-plus-circle' }} me-1"></i>
                            {{ isset($editMode) && $editMode ? 'Modifier' : 'Ajouter' }}
                        </button>
                        @if(isset($editMode))
                        <a href="{{ route('admin.clients') }}" class="btn btn-secondary">
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
                <h6 class="m-0 font-weight-bold text-primary">Liste des clients</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom complet</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $c)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-xs me-2 bg-light-primary rounded-circle">
                                            {{ substr($c->nom_complet, 0, 1) }}
                                        </div>
                                        <div>{{ $c->nom_complet }}</div>
                                    </div>
                                </td>
                                <td>{{ $c->user->email }}</td>
                                <td>{{ $c->tel }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.clients.edit', $c->id) }}" class="btn btn-sm btn-warning" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.clients.destroy', $c->id) }}" method="POST" class="d-inline">
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
@endsection

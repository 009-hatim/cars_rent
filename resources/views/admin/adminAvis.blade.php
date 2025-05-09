@extends('admin.admin')

@section('title', 'Gestion des Avis')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1>Gestion des Avis Clients</h1>
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Liste des avis</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Véhicule</th>
                            <th>Note</th>
                            <th>Commentaire</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($avis as $avi)
                        @if ($avi->client && $avi->client->user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-2 bg-light-primary rounded-circle">
                                        {{ substr($avi->client->user->nom, 0, 1) }}
                                    </div>
                                    <div>{{ $avi->client->user->nom }} {{ $avi->client->user->prenom }}</div>
                                </div>
                            </td>
                            <td>
                                @if($avi->vehicule)
                                {{ $avi->vehicule->marque }} {{ $avi->vehicule->model }}
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $avi->note ? ' text-warning' : ' text-muted' }}"></i>
                                    @endfor
                                </div>
                            </td>
                            <td>{{ Str::limit($avi->commentaire, 50) }}</td>
                            <td>{{ $avi->created_at ? $avi->created_at->format('d/m/Y') : '-' }}</td>
                            <td>
                                <form action="{{ route('admin.avis.destroy', $avi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Confirmer la suppression de cet avis ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

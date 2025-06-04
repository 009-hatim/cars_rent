@extends('admin.admin')

@section('title', 'Détails du message')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-primary"><i class="fas fa-envelope me-2"></i>Détails du message #{{ $message->id }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Expéditeur</h5>
                    @if($message->user)
                        <p>{{ $message->user->name }} ({{ $message->user->email }})</p>
                    @else
                        <p>Visiteur non enregistré</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>Date</h5>
                    <p>{{ $message->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <div class="mb-4">
                <h5>Titre</h5>
                <p class="lead">{{ $message->titre }}</p>
            </div>

            <div class="mb-4">
                <h5>Message</h5>
                <div class="p-3 bg-light rounded">
                    {!! nl2br(e($message->message)) !!}
                </div>
            </div>

            <a href="{{ route('admin.messages') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection

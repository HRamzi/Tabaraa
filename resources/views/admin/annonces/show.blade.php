@extends('layouts.admin')

@section('title', 'Détails de l\'annonce')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Détails de l'annonce</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.annonces.index') }}">Annonces</a></li>
            <li class="breadcrumb-item active">{{ $annonce->titre }}</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-ad mr-1"></i>
                {{ $annonce->titre }}
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $annonce->description }}</p>
                <p><strong>Utilisateur:</strong> {{ $annonce->utilisateur->name }}</p>
                <!-- Ajoutez d'autres détails de l'annonce ici selon vos besoins -->
            </div>
        </div>
    </div>
@endsection

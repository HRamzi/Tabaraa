@extends('layouts.admin')

@section('title', 'Modifier Utilisateur')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Modifier Utilisateur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
            <li class="breadcrumb-item active">Modifier Utilisateur</li>
        </ol>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-edit mr-1"></i>
                        Modifier Utilisateur
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.users.update', $utilisateur->id) }}" method="POST" id="updateUserForm">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Nom_Complet">Nom</label>
                                <input type="text" class="form-control" id="Nom_Complet" name="Nom_Complet" value="{{ $utilisateur->Nom_Complet }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $utilisateur->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Rôle</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="admin" {{ $utilisateur->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="utilisateur" {{ $utilisateur->role === 'utilisateur' ? 'selected' : '' }}>Utilisateur</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" id="updateUserButton">Modifier</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Ajoutez un gestionnaire d'événement pour le clic sur le bouton de modification
        document.addEventListener('DOMContentLoaded', function() {
            const updateUserButton = document.getElementById('updateUserButton');
            updateUserButton.addEventListener('click', function() {
                // Afficher une boîte de dialogue de confirmation
                Swal.fire({
                    title: 'Êtes-vous sûr de vouloir modifier cet utilisateur?',
                    text: "Cette action peut changer les informations de l'utilisateur !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, modifier !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si l'utilisateur confirme la modification, soumettez le formulaire
                        document.getElementById('updateUserForm').submit();
                    }
                });
            });
        });
    </script>
@endsection

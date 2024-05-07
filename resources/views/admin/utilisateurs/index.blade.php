@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Liste des Utilisateurs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Utilisateurs</li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header" style="background-color: #007bff; color: #fff;">
                        <i class="fas fa-users mr-1"></i>
                        Liste des Utilisateurs
                    </div>
                    <div class="card-body" style="padding: 1.25rem;">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; font-weight: bold;">Nom</th>
                                        <th style="text-align: center; font-weight: bold;">Email</th>
                                        <th style="text-align: center; font-weight: bold;">Rôle</th>
                                        <th style="text-align: center; font-weight: bold;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($utilisateurs as $utilisateur)
                                        <tr>
                                            <td style="text-align: center;">{{ $utilisateur->Nom_Complet ?? 'N/A' }}</td>
                                            <td style="text-align: center;">{{ $utilisateur->email ?? 'N/A' }}</td>
                                            <td style="text-align: center;">{{ $utilisateur->role }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $utilisateur->id) }}" class="btn" style="background-color: #28a745; color: #fff; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem;">Modifier</a>
                                                
                                                <!-- Formulaire pour supprimer -->
                                                <form id="deleteForm{{ $utilisateur->id }}" action="{{ route('admin.users.destroy', $utilisateur->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $utilisateur->id }}">
                                                        Supprimer
                                                    </button>
                                                </form>
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

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Ajoutez un gestionnaire d'événement pour le clic sur le bouton de suppression
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    // Affichez une boîte de dialogue de confirmation
                    Swal.fire({
                        title: 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?',
                        text: "Cette action est irréversible !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Oui, supprimer !',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Si l'utilisateur confirme la suppression, soumettez le formulaire
                            const form = document.querySelector('#deleteForm' + userId);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                title: '{{ session('success') }}',
                icon: 'success'
            });
        </script>
    @endif

@endsection

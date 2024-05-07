@extends('layouts.admin')

@section('title', 'Annonces')

@section('content1')
    <div class="container-fluid">
        <h1 class="mt-4">Liste des Annonces</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Annonces</li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-ad mr-1"></i>
                        Liste des Annonces
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Utilisateur</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($annonces as $annonce)
                                        <tr>
                                            <td>{{ $annonce->id }}</td>
                                            <td>{{ $annonce->titre }}</td>
                                            <td>{{ $annonce->description }}</td>
                                            <td>{{ $annonce->utilisateur->Nom_Complet }}</td>
                                            <td>
                                                <a href="{{ url('/annonce', $annonce->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $annonce->id }}">Supprimer</button>
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
                    const annonceId = this.getAttribute('data-id');
                    // Affichez une boîte de dialogue de confirmation
                    Swal.fire({
                        title: 'Êtes-vous sûr de vouloir supprimer cette annonce ?',
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
                            const form = document.createElement('form');
                            form.action = "{{ route('admin.annonces.destroy', ':id') }}".replace(':id', annonceId);
                            form.method = 'POST';
                            form.innerHTML = `
                                @csrf
                                @method('DELETE')
                            `;
                            document.body.appendChild(form);
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
                title: '{{ session('success')}}',
                icon: 'success'
            });
        </script>
    @endif

@endsection

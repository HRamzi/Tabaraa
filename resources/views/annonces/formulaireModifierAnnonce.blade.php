<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="{{ asset('assets/js/App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/logoT.svg') }}">
    <title>Tabaraa</title>
</head>

<body id="page-signup">

    <header class="tabaraa-header">
        @include('components.userAuth.header')
    </header>

    <div class="ham-nav ham-right" id="nav-user" data-icon="user" data-title="Tabaraa">
        <div class="title">
            <i class="fa fa-user"></i>
            <span class="f-grow-1 flex-text">profile</span>
            <span class="ham-close"><i class="fa fa-close"></i></span>
        </div>
        <div class="ham-content">
            <a href="{{ route('profile') }}" title="Gérer mon compte">Mon compte</a>
            <a href="{{ route('mesAnnonces') }}" title="Voir la liste de mes annonces">Mes annonces</a>
            <a href="{{ route('annonces.create') }}" title="Publier une annonce">Créer une annonce</a>
            <a href="{{ route('afficherFormulaireConnexion') }}" rel="nofollow">Se déconnecter</a>
        </div>
    </div>
    
    <div class="ham-nav ham-right" id="nav-global" data-icon="bell" data-title="Tabaraa">
        <div class="title">
            <i class="fa fa-bars"></i>
            <span class="f-grow-1 flex-text">Tabaraa</span>
            <span class="ham-close"><i class="fa fa-close"></i></span>
        </div>
        <div class="ham-content" id="notifs-content">
            <br>
            <a href="{{ route('afficherFormulaireConnexion') }}" title="Me connecter à mon compte"><i class="fa fa-user fa-lg"></i>&nbsp; &nbsp; Se connecter</a>
            <a href="{{ route('afficherFormulaireInscription') }}" title="Créer un compte"><i class="fa-solid fa-user-plus fa-lg"></i>&nbsp; &nbsp; S'inscrire</a>
            <br>
            <span>Catégories</span>
            <a href="{{ route('vetement') }}" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            <a href="{{ route('livre') }}" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            <a href="{{ route('medecine') }}" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            <a href="{{ route('article_maison') }}" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            <a href="{{ route('auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="{{ route('autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>
        </div>
    </div>

    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="containerr main-bg">
            <h1 class="rep pt-lg ma-none"><i class="fa fa-file-text-o"></i>Créer une annonce</h1>
            <span class="block pa-md pb-none">
                <div class="panel"></div>
            </span>
            <form action="{{ route('annonces.update', $annonce) }}" method="post" id="formAnnonce" class="custom-form mt-lg" enctype="multipart/form-data">
                @csrf
                <div id="content-form" class="detail-annonce">
                    <div id="content-titre" class="text-md">
                        <div class="pa-md">
                            <div class="mb-xs">
                                <h4>Titre de l'annonce :</h4>
                            </div>
                            <input type="text" class="form-control full-size reset-input autoValidation" size="55" maxlength="50" id="titre" name="titre" value="{{ $annonce->titre }}" placeholder="chaise, pull..." />
                            <br><span class="text-danger">@error('titre') {{ $message }} @enderror</span>
                        </div>
                        <div class="pa-md">
                            <div id="selectCateg">
                                <span class="block mb-xs">
                                    <h4>Choisissez une catégorie :</h4>
                                </span>
                                <div class="select2" id="cat">
                                    <input type="hidden" id="cat-target" value="{{ $annonce->categorie }}" name="choisir_categorie" class="autoValidation" />
                                    <span class="label">
                                        &nbsp;
                                        <select name="categorie" class="ca">
                                            @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="pa-md">
                            <div id="selectCateg">
                                <span class="block mb-xs">
                                    <h4>Choisissez votre ville :</h4>
                                </span>
                                <div class="select2" id="cat">
                                    <span class="label">
                                        &nbsp;
                                        <select name="ville">
                                            <option value="Tlemcen">Tlemcen</option>
                                            <option value="Oran">Oran</option>
                                            <option value="Alger">Alger</option>
                                            <option value="Ain Temouchent">Ain Temouchent</option>
                                            <option value="Blida">Blida</option>
                                            <option value="Annaba">Annaba</option>
                                            <option value="Constantine">Constantine</option>
                                            <option value="Sidi Bel Abbes">Sidi Bel Abbes</option>
                                            <option value="Tipaza">Tipaza</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="pa-md">
                            <div class="mb-xs">
                                <h4>Numéro De Téléphone :</h4>
                            </div>
                            @php $utilisateur = auth()->user(); @endphp
                            <input type="text" class="form-control full-size reset-input autoValidation" maxlength="10" id="numero_telephone" name="numero_telephone" value="{{$utilisateur->numero_telephone}}" pattern="0(5|6|7)[0-9]{8}" required />
                        </div>
                        <div class="pa-md">
                            <div class="mb-xs">
                                <h4>Photo Principale :</h4>
                            </div>
                            <input type="file" class="form-control full-size reset-input autoValidation" id="photo" name="photo" value="{{ $annonce->photo }}" accept=".PNG,.JPG" multiple />
                            <br><span class="text-danger">@error('photo') {{ $message }} @enderror</span>
                        </div>
                        <div class="pb-md mt-md">
                            <h4 class="pa-md">Description du don :</h4>
                            <div class=" pa-sm">
                                <textarea class="full-size reset-input text-black autoValidation" id="description" name="description" maxlength="400" placeholder="Détaillez votre annonce (taille, couleur ...)" rows="5">{{ $annonce->description }}</textarea>
                                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="f-container f-content-center text-center pa-md">
                    <div class="f-item">
                        <button class="btn f-md-40 ma-xs xl blue submit-form" type="submit" onclick="showSuccessMessage()">Publier</button>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
 $(document).ready(function() {
    let messageShown = false; // Flag to ensure the success or error message is shown only once

    $('#formAnnonce').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.code === 1 && !messageShown) {
                    $('#content-form').hide();
                    // Appeler la fonction showSuccessMessage lorsque la modification est réussie
                    showSuccessMessage();
                    messageShown = true; // Set the flag to true
                } else if (!messageShown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message // Afficher le message d'erreur retourné par le serveur
                    });
                    messageShown = true; // Set the flag to true
                }
            },
            error: function(xhr, status, error) {
                const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Une erreur est survenue. Veuillez réessayer.';
                if (!messageShown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage
                    });
                    messageShown = true; // Set the flag to true
                }
            }
        });
    });

    // Définition de la fonction showSuccessMessage
    function showSuccessMessage() {
        Swal.fire({
            icon: 'success',
            title: 'Succès!',
            text: 'Annonce modifiée avec succès!',
            timer: 3000, // temps en millisecondes
            timerProgressBar: true,
            willClose: () => {
                // Rediriger vers la page spécifique après la modification réussie de l'annonce
                window.location.href = "{{ route('mesAnnonces') }}";
            }
        });
    }
});


</script>




        <div id="dbalpha"></div>
        <div id="dialogBoxContent"></div>
        <div id="toast-box"></div>
        <div class="page-bottom">
            <div class="container">
                <div class="page-bottom-promote">
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets/images/logo1icondonation.png') }}" loading="lazy" decoding="async" alt="" /><br>
                    <span class="pt-none mt-none ml-none"><span class="text-orange">Nous donnons des dons à toutes </span>
                        &nbsp;
                        <span class="text-blue-light">personnes étant dans le besoin</span></span>
                </div>
            </div>
        </div>
        <footer class="footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="">Contact : Tabaraa.dz@gmail.com</a></li>
            </ul>
            <p>&copy;2024 Tabaraa | Tous droits réservés</p>
        </footer>
    </div>

    <script>
        var $globals = {
            "API_Options": "{}",
            "API_Modules": "{}"
        };
    </script>
    <script src="{{ asset('assets/js/script1.js') }}"></script>
    <script src="{{ asset('assets/js/script2.js') }}"></script>
    <script src="{{ asset('assets/js/script3.js') }}"></script>
    <script src="{{ asset('assets/js/user.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets\js\sweetAlert.js') }}"></script>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
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
            <a href="{{ route('profile') }}" title="compte">Mon compte</a>
            <a href="{{ route('mesAnnonces') }}" title="mes annonces">Mes annonces</a>
<a href="{{ route('annonces.create') }}" title="Publier une annonce">Créer une annonce</a>
 <a href="{{ route('afficherFormulaireConnexion') }}">Se déconnecter</a>
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
            <a href="{{ route('afficherFormulaireConnexion') }}" title="Me connecter à mon compte"><i class="fa fa-user fa-lg"></i>&nbsp; &nbsp; Se connecter
            </a>
            <a href="{{ route('afficherFormulaireInscription') }}" title="Créer un compte"><i class="fa-solid fa-user-plus fa-lg"></i>&nbsp; &nbsp; S'inscrire
            </a>
            <br>
            <span>Catégories</span>
            <a href="{{ route('userAuth_vetement') }}" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            <a href="{{ route('userAuth_livre') }}" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            <a href="{{ route('userAuth_medecine') }}" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            <a href="{{ route('userAuth_articleMaison') }}" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            <a href="{{ route('userAuth_auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="{{ route('userAuth_autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>

        </div>
    </div>


    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="container main-bg">
            <h1 class="rep pt-lg ma-none"><i class="fa fa-file-text-o"></i>Créer une annonce</h1>
            <span class="block pa-md pb-none">
                <div class="panel"></div>
            </span>
            <form action="{{ route('annonces.store') }}" method="post" id="formAnnonce" class="custom-form mt-lg" enctype="multipart/form-data">
                @csrf
                <div id="content-form" class="detail-annonce">
                    <div id="content-titre" class="text-md">
                        <div class="pa-md">
    <div class="mb-xs">
        <h4>Titre de l'annonce :</h4>
    </div>
    <input type="text" class="form-control full-size reset-input autoValidation" size="55" maxlength="50" id="titre" name="titre" value="{{ old('titre') }}" placeholder="chaise, pull..." />
    <br>
    @if($errors->has('titre'))
    <span class="text-danger">{{ $errors->first('titre') }}</span>
    @endif
</div>

<div class="pa-md">
    <div id="selectCateg">
        <span class="block mb-xs">
            <h4>Choisissez une catégorie :</h4>
        </span>
        <div class="select2" id="cat">
            <input type="hidden" id="cat-target" value="" name="choisir_categorie" class="autoValidation" />
            <span class="label">
                &nbsp;
                <select name="categorie" class="ca">
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie->nom }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </span>
        </div>
    </div>
    @if($errors->has('categorie'))
    <span class="text-danger">{{ $errors->first('categorie') }}</span>
    @endif
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
    @if($errors->has('ville'))
    <span class="text-danger">{{ $errors->first('ville') }}</span>
    @endif
</div>

<div class="pa-md">
    <div class="mb-xs">
        <h4>Numéro De Téléphone :</h4>
    </div>
    @php $utilisateur = auth()->user(); @endphp
    <input type="text" class="form-control full-size reset-input autoValidation" maxlength="10" id="numero_telephone" name="numero_telephone" value="{{$utilisateur->numero_telephone}}" pattern="0(5|6|7)[0-9]{8}" required />
    @if($errors->has('numero_telephone'))
    <span class="text-danger">{{ $errors->first('numero_telephone') }}</span>
    @endif
</div>

<div class="pa-md">
    <div class="mb-xs">
        <h4>Photo Principale :</h4>
    </div>
    <input type="file" class="form-control full-size reset-input autoValidation" id="photo" name="photo" value="{{ old('photo') }}" accept=".PNG,.JPG" multiple />
    @if($errors->has('photo'))
    <span class="text-danger">{{ $errors->first('photo') }}</span>
    @endif
</div>

<div class="pb-md mt-md">
    <h4 class="pa-md">Description du don :</h4>
    <div class=" pa-sm">
        <textarea class="full-size reset-input text-black autoValidation" id="description" name="description" maxlength="400" placeholder="Détaillez votre annonce (taille, couleur ...)" rows="5">{{ old('description') }}</textarea>
        @if($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

                        </div>
                        <!-- Bouton de soumission du formulaire -->
                        <div class="f-container f-content-center text-center pa-md">
                            <div class="f-item">
                                <!-- Appel de la fonction submitForm() lorsque le bouton est cliqué -->
                                <button class="btn f-md-40 ma-xs xl blue submit-form" type="button" onclick="submitForm()">Publier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div id="dbalpha"></div>
        <div id="dialogBoxContent"></div>
        <div id="toast-box"></div>
        <div class="page-bottom">
            <div class="container">
                <div class="page-bottom-promote">
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="" /><br>
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
    // Cette fonction vérifie la réponse du serveur et affiche le message approprié
    function handleResponse(data) {
        if (data.code === 1) {
            // Affichage d'un message de succès avec SweetAlert
            Swal.fire({
                title: "Annonce créée avec succès !",
                text: "Votre annonce a été publiée avec succès.",
                icon: "success",
                timer: 5000
            });
        } else {
            // Affichage d'un message d'erreur générique
            Swal.fire({
                title: "Erreur !",
                text: "Une erreur s'est produite lors de la publication de votre annonce.",
                icon: "error",
                timer: 5000
            });

            // Si le serveur a renvoyé des erreurs de validation
            if (data.errors) {
                // Afficher les messages d'erreur de validation
                Object.values(data.errors).forEach(function(error) {
                    Swal.fire({
                        title: "Erreur de validation !",
                        text: error[0],
                        icon: "error",
                        timer: 5000
                    });
                });
            }
        }
    }

    // Fonction pour envoyer le formulaire et gérer la réponse
    function submitForm() {
        var form = document.getElementById('formAnnonce');
        var formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-Token': document.head.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            handleResponse(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

...

    <script>
        var $globals = {
            "API_Options": "{}",
            "API_Modules": "{}"
        };
    </script>
    <script src="{{ asset('assets\js\script1.js') }}"></script>
    <script src="{{ asset('assets\js\script2.js') }}"></script>
    <script src="{{ asset('assets\js\script3.js') }}"></script>
    <script src="{{ asset('assets\js\user.js') }}"></script>
</body>

</html>

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
        <div class="head-top"></div>
        <div class="toolsbar-dummy"></div>
        <div class="toolsbar f-container f-align-stretch">
            <div class="limiter-large">
                <div class="f-container f-wrap-nowrap f-item" id="main-appbar">
                    <div class="mq-sm-hidden">
                        <button title="Menu" class="repliable ham-toggle" data-target="nav-global">
                            <span class="shell global-shell">
                                <i class="fa fa-bars fa-lg"></i>
                            </span>
                        </button>
                    </div>
                    <div class="f-container">
                        <div class="f-align-self-start">
                            <a class="f-container logo-picto" href="{{ route('userHome') }}" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="20" width="20" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                            <a class="f-container logo-full" href="{{ route('userHome') }}" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="50" width="100" src="{{ asset('assets\images\Tabaraalogo.svg') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                        </div>
                    </div>
                    <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-center ">
                        <div class="header-search f-content-between" id="header-search-loc">
                            <span class="header-search-resume">
                                <span class="header-search-resume-emphasis">Rechercher un don...</span>
                                <span class="header-search-resume-secondary"></span>
                            </span>
                            <button type="button" aria-label="Recherche"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-end">
                        <button title="Ma messagerie" class="repliable ham-toggle btn-light position-relative" onclick="markAllMessagesAsRead()">
                            <a href="{{ route('messages') }}" class="text-decoration-none">
                                <span class="shell msgs-shell position-relative d-inline-block">
                                    <i class="fa fa-envelope fa-lg position-relative d-block mx-auto"></i>
                                    <span id="message-counter" class="badge badge-pill badge-primary bg-danger position-absolute top-0 start-100 translate-middle p-1"></span>
                                </span>
                            </a>
                        </button>

                        <script src="{{ asset('assets\js\jQuery.js') }}"></script> <!-- Assurez-vous d'inclure jQuery -->

                        <script>
                            // Fonction pour marquer tous les messages comme lus
                            function markAllMessagesAsRead() {
                                $.ajax({
                                    url: "{{ route('markAllMessagesAsRead') }}",
                                    method: "POST",
                                    success: function(data) {
                                        console.log(data); // Ajoutez cette ligne pour afficher le résultat dans la console
                                        if (data.success) {
                                            // Mettre à jour le compteur de messages
                                            $('#message-counter').text('').removeClass('show'); // Retire le compteur de messages
                                        } else {
                                            console.error('Erreur lors de la mise à jour des messages.');
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(error);
                                    }
                                });
                            }
                            // Fonction pour mettre à jour le compteur de messages
                            function updateMessageCounter() {
                                $.ajax({
                                    url: "{{ route('getMessageCount') }}",
                                    method: "GET",
                                    success: function(data) {
                                        if (data.count > 0) {
                                            $('#message-counter').text(data.count).addClass('show'); // Ajoute la classe 'show' si le compteur est supérieur à 0
                                        } else {
                                            $('#message-counter').removeClass('show'); // Retire la classe 'show' si le compteur est égal à 0
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(error);
                                    }
                                });
                            }

                            // Appeler la fonction pour mettre à jour le compteur au chargement de la page
                            $(document).ready(function() {
                                updateMessageCounter();
                            });
                        </script>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button title="Accès à mon compte" class="repliable ham-toggle" data-target="nav-user">
                            <span class="shell">
                                @php $utilisateur = auth()->user(); @endphp
                                @if($utilisateur)
                                <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" loading="lazy" decoding="async" alt="Mon avatar">
                                @else
                                <img src="{{ asset('assets\images\avatar.png') }}" loading="lazy" decoding="async" alt="Mon avatar">
                                @endif
                            </span>
                        </button>

                    </div>

                    <!-- <div class="f-grow-1 f-container f-wrap-nowrap f-align-end f-content-end">
                        <div class="mq-sm-visible">
                            <div class="f-container f-align-center">
                                
                                <button title="Ma messagerie" class="repliable ham-toggle" data-target="nav-mails">
                                    <a href="message.html">
                                        <span class="shell msgs-shell">
                                        <i class="fa fa-envelope fa-lg"></i>
                                    </span>
                                    </a>
                                </button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <button title="Accès à mon compte" class="repliable ham-toggle" data-target="nav-user">
                                    <span class="shell">
                                        <img src="avatar.png" loading="lazy" decoding="async" alt="Mon avatar">
                                    </span>
                                </button>
                            </div>
                        </div>                   
                    </div>  -->

                </div>
                <div class="f-container f-content-center spaced" id="global-search">
                    <div class="f-item">
                        <div id="search-header-appbar">
                            <button id="close-search-header"><i class="fa fa-chevron-left"></i></button>
                            <span>Ma recherche</span>
                        </div>
                        <form action="{{ route('rechercher') }}" method="POST">
                            @csrf
                            <div class="f-container pt-sm search-filter-zone text-sm">
                                <div class="search-cell">
                                    <label for="search-header-keywords" class="search-input-label">Que recherchez-vous ?</label>
                                    <input class="select2" name="termes" id="search-header-keywords" type="text" maxlength="20" placeholder="Table,Pull..." value="" />
                                </div>
                                <div class="search-cell">
                                    <label for="search-header-keywords" class="search-input-label">Sur quelle ville ?</label>
                                    <input class="select2" name="ville" id="search-header-keywords" type="text" maxlength="50" placeholder="Tlemcen,Oran.." value="" />
                                    <!-- <span class="search-header-reset-keywords disabled"><i class="fa fa-close"></i></span> -->
                                </div>
                                <div class="search-cell">
                                    <button type="submit" id="search-header-submit" class="search-valid search" data-target="#search-header-alert">
                                        <i class="fa fa-search"></i>
                                        Rechercher
                                        <!-- <span class="search-header-nb-results"></span> -->
                                        <div id="search-header-alert" class="text-xs text-center display-soft-none">
                                            Veuillez sélectionner au moins un critère ci-dessus
                                        </div>
                                    </button>
                                    <div class="pt-sm text-center bloc_saved_search has-recherches display-none">
                                        <button class="btn outline  open-saved-search">Mes recherches</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <button id="global-search-close" class="icon-btn "><i class="fa fa-arrow-up"></i></button>
                </div>
            </div>
        </div>
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
            <a href="{{ route('annonces.cree') }}" title="Publier une annonce">Créer une annonce</a>
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
        <div class="containerr main-bg">
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
                            <br><span class="text-danger">@error('titre') {{ $message }} @enderror</span>
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
                            <input type="file" class="form-control full-size reset-input autoValidation" id="photo" name="photo" value="{{ old('photo') }}" accept=".PNG,.JPG" multiple />
                            <br><span class="text-danger">@error('photo') {{ $message }} @enderror</span>
                        </div>
                        <div class="pb-md mt-md">
                            <h4 class="pa-md">Description du don :</h4>
                            <div class=" pa-sm">
                                <textarea class="full-size reset-input text-black autoValidation" id="description" name="description" maxlength="400" placeholder="Détaillez votre annonce (taille, couleur ...)" rows="5">{{ old('description') }}</textarea>
                                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="f-container f-content-center text-center pa-md">
                    <div class="f-item">
                        <button class="btn f-md-40 ma-xs xl blue submit-form" type="submit">Publier</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function showSuccessMessage() {
                var data = {
                    code: 1
                };
    
                // Vérifiez si la réponse de la requête est 1 (succès)
                if (data.code === 1) {
                    // Affichage d'un message de succès avec SweetAlert
                    Swal.fire({
                        title: "Annonce créée avec succès !",
                        icon: "success",
                        timer: 5000
                    });
                }
            }
        </script>

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
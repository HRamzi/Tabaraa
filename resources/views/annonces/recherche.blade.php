<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.png') }}">
    <title>Résultats de la Recherche</title>
</head>

<body id="page-liste">

    @if(auth()->check())
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
                            <div class="f-container pt-sm search-filter-zone text-sm">
                                <div class="search-cell">
                                    <label for="search-header-keywords" class="search-input-label">Que recherchez-vous ?</label>
                                    <input class="select2" id="search-header-keywords" type="text" maxlength="20" placeholder="Table,Pull..." value="" />
                                </div>
                                <div class="search-cell">
                                    <label for="search-header-keywords" class="search-input-label">Sur quelle ville ?</label>
                                    <input class="select2" id="search-header-keywords" type="text" maxlength="50" placeholder="Tlemcen,Oran.." value="" />
                                    <!-- <span class="search-header-reset-keywords disabled"><i class="fa fa-close"></i></span> -->
                                </div>
                                <div class="search-cell">
                                    <button id="search-header-submit" class="search-valid search" data-target="#search-header-alert">
                                        <i class="fa fa-search"></i>
                                        <a href="{{ route('rechercher') }}">Rechercher</a>
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
                        </div>
                        <button id="global-search-close" class="icon-btn "><i class="fa fa-arrow-up"></i></button>
                    </div>
                </div>
            </div>
        </header>
    @else
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
                                <a class="f-container logo-picto" href="{{ route('home') }}" title="Site de don d'objets">
                                    <img class="logo f-align-self-center" height="50" width="50" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                                </a>
                                <a class="f-container logo-full" href="{{ route('home') }}" title="Site de don d'objets">
                                    <img class="logo f-align-self-center" height="50" width="100" src="{{ asset('assets\images\Tabaraalogo.svg') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                                </a>
                            </div>
                        </div>
                        <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-center">
                            <div class="header-search f-content-end" id="header-search-loc">
                                <span class="header-search-resume">
                                    <span class="header-search-resume-emphasis">Rechercher un don...</span>
                                    <span class="header-search-resume-secondary"></span>
                                </span>
                                <button type="button" aria-label="Recherche"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-end">
                            <a class="repliable btn  post-holder" href="{{ route('annonces.cree') }}" title="Publier une annonce pour donner un objet">
                                <i class="fa fa-plus"></i>
                                <span class="label">Créer une annonce</span>
                            </a>
                            <a id="header-login-btn" class="repliable tool" href="{{ route('afficherFormulaireConnexion') }}">
                                <i class="fa fa-user fa"></i>
                                <span>Mon Compte</span>
                            </a>
                        </div>
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
    @endif
    @if(auth()->check())
        <div class="ham-nav ham-right" id="nav-user" data-icon="user" data-title="profil">
            <div class="title"><i class="fa fa-user"></i>
                <span class="f-grow-1 flex-text">profile</span>
                <span class="ham-close"><i class="fa fa-close"></i></span>
            </div>
            <div class="ham-content">
                <a href="{{ route('profile') }}" title="Gérer mon compte">Mon compte</a>
                <a href="{{ route('mesAnnonces') }}" title="Voir la liste de mes annonces">Mes annonces</a>
                <a href="{{ route('annonces.cree') }}" title="Publier une annonce">Créer une annonce</a>
                <a href="{{ route('deconnexion') }}" rel="nofollow">Se déconnecter</a>
            </div>
        </div>
    @endif
    @if(auth()->check())
        <div class="ham-nav ham-right" id="nav-global" data-icon="bell" data-title="Tabaraa">
            <div class="title">
                <i class="fa fa-bars"></i>
                <span class="f-grow-1 flex-text">Tabaraa</span>
                <span class="ham-close"><i class="fa fa-close"></i></span>
            </div>
            <div class="ham-content" id="notifs-content">
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
    @endif
    <div class="ham-nav ham-right" id="nav-global" data-icon="bell" data-title="Tabaraa">
        <div class="title">
            <i class="fa fa-bars"></i>
            <span class="f-grow-1 flex-text">Tabaraa</span>
            <span class="ham-close"><i class="fa fa-close"></i></span>
        </div>
        <div class="ham-content" id="notifs-content">
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
        <div class="container main-bg">
            <div><br><br></div>
            <h2 class="text-left f-item"><b></b></h2>
            <div class="container f-container f-wrap-nowrap">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div id="search-wrapper">
                    <div id="search">
                        @if($annonces->count() > 0)
                        @foreach($annonces as $annonce)
                        <div class="don" href="/don/{{ $annonce->id }}" title="{{ $annonce->titre }}" class="lst-annonce cat-{{ $annonce->categorie }}">
                            <div class="line"></div>
                            <div class="list-item f-container f-wrap-nowrap">
                                <div class="cover">
                                    <img src="{{ asset('storage/' . $annonce->photo) }}" title="{{ $annonce->titre }}" width="200" height="200" style="margin-top: 80px;" />
                                </div>
                                <div class="f-item f-container f-wrap-nowrap pa-md">
                                    <div class="f-grow-1">
                                        <div class="f-item f-container f-wrap-nowrap pa-sm">
                                            <div>
                                                <h2 class="title">{{ $annonce->titre }}</h2>
                                                <div class="city pt-sm">
                                                    <i class="fa fa-map-marker"></i>
                                                    &nbsp;{{ $annonce->ville }}
                                                </div>
                                                <div class="f-grow-1 text-left pt-md">
                                                    <i class="fa fa-clock-o"></i>
                                                    &nbsp;{{ $annonce->created_at->format('d M Y') }}
                                                </div>
                                                <p class="city pt-sm">{{ $annonce->description }}</p>
                                            </div>
                                        </div>
                                        <div class="f-container f-content-end pa-xs">
                                            <button type="button" class="btn blue" onclick="window.location='{{ route('annonce.details', ['id' => $annonce->id]) }}'">Je suis intéressé</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else <p>Aucune annonce disponible</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="dbalpha"></div>
        <div id="dialogBoxContent"></div>
        <div id="toast-box"></div>

        <div class="page-bottom">
            <div class="container">
                <div class="page-bottom-promote">
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }} " /><br>
                    <span class="pt-none mt-none ml-none"><span class="text-orange">Nous donnons des dons à toutes </span>
                        &nbsp;
                        <span class="text-blue-light">personnes étant dans le besoin</span></span>
                </div>
            </div>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>

        <footer class="footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="">Contact : Tabaraa.dz@gmail.com</a></li>
            </ul>
            <p>&copy;2024 Tabaraa | Tous droits réservés</p>
        </footer>
    </div>



    <script src="{{ asset('assets\js\script4.js') }}" type="text/javascript"></script>
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
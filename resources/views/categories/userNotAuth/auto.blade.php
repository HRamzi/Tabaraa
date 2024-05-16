<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
    <title>Tabaraa</title>
</head>

<body id="page-liste">
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

                        <a class="repliable btn  post-holder" href="{{ route('annonces.create') }}" title="Publier une annonce pour donner un objet">
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
            <h2 class="text-left f-item"><b>Annonces Auto</b></h2>
            <div class="container f-container f-wrap-nowrap ">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div id="search-wrapper">
                    <div id="search">
                        <!-- Utiliser une boucle foreach pour afficher les annonces -->
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
                                            <button type="button" class="btn blue" onclick="window.location='{{ route('annonces.details', ['id' => $annonce->id]) }}'">Je suis intéressé</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else <p>Aucune annonce disponible pour cette catégorie.</p>
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
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }}" /><br>
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
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.png') }}">
    <title>Tabaraa</title>

</head>

<body id="page-home">
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
                            <a class="f-container logo-picto" href="#" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="20" width="20" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                            <a class="f-container logo-full" href="#" title="Site de don d'objets">
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

                        <button title="Ma messagerie" class="repliable ham-toggle" data-target="nav-mails">
                            <a href="{{ route('messages') }}">
                                <span class="shell msgs-shell">
                                    <i class="fa fa-envelope fa-lg"></i>
                                </span>
                            </a>
                        </button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button title="Accès à mon compte" class="repliable ham-toggle" data-target="nav-user">
                            <span class="shell">
                                @php $utilisateur = auth()->user(); @endphp
                                <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" loading="lazy" decoding="async" alt="Mon avatar">
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

    <div class="ham-nav ham-right" id="nav-global" data-icon="bell" data-title="Tabaraa">
        <div class="title">
            <i class="fa fa-bars"></i>
            <span class="f-grow-1 flex-text">Tabaraa</span>
            <span class="ham-close"><i class="fa fa-close"></i></span>
        </div>
        <div class="ham-content" id="notifs-content">
            <br>
            <span>Catégories</span>
            href="{{ route('userAuth_vetement') }}" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            href="{{ route('userAuth_livre') }}" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            href="{{ route('userAuth_medecine') }}" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            href="{{ route('userAuth_article_maison') }}" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            href="{{ route('userAuth_auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            href="{{ route('userAuth_autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>

        </div>
    </div>
    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="container main-bg">
            <div class="f-container f-wrap-nowrap f-direction-column-reverse f-lg-direction-row">
                <div id="home" class="f-item pa-md pt-none">

                    <div class="home-community pa-md ma-md">
                        <div class="home-community-column home-community-first-panel f-grow-1 ">
                            <span class="headline">&nbsp;&nbsp;&nbsp;&nbsp;<i>Bienvenue sur le site de dons <b>Tabaraa </b>, où vous pouvez donner et trouver des objets autour de vous !</i></span>
                            <div class="home-community-mob-counter">
                                <div class=""></div>
                            </div>
                            <div class="home-give-link">
                                <img class="ijgauche" src="{{ asset('assets\images\homeImageTabaraa2.svg') }}" width="400" height="240" alt="imagedroiteLivreTabaraa">
                            </div>
                        </div>

                        <div id="counter-holder" class="home-community-column ">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <img class="ijdroite" src="{{ asset('assets\images\homeImageTabaraa1.svg') }}" width="430" height="230" alt="imagegauchevetementsTabaraa">

                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <div class="home-community-mob-counter">
                                <span class="community-side">
                                    <span class="text-orange">&nbsp;&nbsp;&nbsp;Tout donner ou tout récupérer,</span>
                                    &nbsp;
                                    <span class="text-blue-light">le tout &nbsp;&nbsp;&nbsp;&nbsp; gratuit !</span>
                                </span>
                            </div>
                            <div class="community-counter"></div>
                        </div>
                    </div>

                    <div class="f-container">
                        <div class="home-content-column">
                            <div class="f-container pa-xs ma-md">
                                <h1 class="text-center f-item"><b>Catégories</b></h1>
                                <div class="swiper-grid f-item">
                                    <div class="swiper-grid-nav swiper-category-prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    </div>
                                    <div class="swiper-grid-content">
                                        <div id="swiper-category" class="swiper">
                                            <div class="swiper-wrapper">
                                                <a class="home-category swiper-slide" href="{{ route('vetement') }}" title="Vêtements">
                                                    <img src="{{ asset('assets\images\VetementTabaraa.svg') }}" height="100" width="100">
                                                    <div class="infos">Vetements</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="{{ route('medecine') }}" title="Medecines">
                                                    <img src="{{ asset('assets\images\MedecineTabaraa.svg') }}" height="100" width="100">
                                                    <div class="infos">Medecines</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="{{ route('article_maison') }}" title="artice_maison">
                                                    <img src="{{ asset('assets\images\ArticleMaisonTabaraa.svg') }}" height="100" width="100">
                                                    <div class="infos">Articles Maison</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="{{ route('livre') }}" title="Livres">
                                                    <img src="{{ asset('assets\images\LivresTabaraa.svg') }}" height="100" width="100">
                                                    <div class="infos">Livres</div>
                                                </a>

                                                <a class="home-category swiper-slide" href="{{ route('auto') }}" title="Pièces Automobiles">
                                                    <img src="{{ asset('assets\images\AutoTabaraa.svg') }}" height="100" width="100">
                                                    <div class="infos">Pièces Automobiles</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="{{ route('autre') }}" title="Autres">
                                                    <img src="{{ asset('assets\images\AutreTabaraa.svg') }}" height="100" width="100">
                                                    <div class="infos">Autres</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-grid-nav swiper-category-next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="f-container pa-xs ma-xs swiper-suggest">
                                <h2 class="text-center f-item"><b>Vêtements</b></h2>
                                <div class="swiper-grid f-item">
                                    <div class="swiper-grid-nav swiper-suggest-prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    </div>
                                    <div class="swiper-grid-content">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                @if($vetements)
                                                    @foreach($vetements as $annonce)
                                                    <a class="home-suggest swiper-slide" href="{{ route('annonce.details', ['id' => $annonce->id]) }}" title="{{ $annonce->titre }}">
                                                        <div class="cover">
                                                            <img class="photo" src="{{ asset('storage/' . $annonce->photo) }}" alt="pantalon">
                                                        </div>
                                                        <div class="infos">
                                                            <div class="title">{{ $annonce->titre }}</div>
                                                            <div class="loc">{{ $annonce->ville }}</div>
                                                            <div><i class="fa fa-clock-o"></i>&nbsp;{{ $annonce->created_at->format('d M Y') }}</div>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                @else
                                                <p>Aucune annonce disponible pour cette catégorie.</p>
                                                @endif
                                                <!-- Répétez ce bloc pour chaque catégorie -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-grid-nav swiper-suggest-next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="f-item text-center pa-md ma-md">
                                    <a href="{{ route('userAuth_vetement') }}" title="Voir tous les dons"><b>Voir plus de dons..</b></a>
                                </div>
                            </div>

                            <div class="f-container pa-xs ma-md swiper-suggest">
                                <h2 class="text-center f-item"><b>Médecines</b></h2>
                                <div class="swiper-grid f-item">
                                    <div class="swiper-grid-nav swiper-suggest-prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    </div>
                                    <div class="swiper-grid-content">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                @if($medecine)
                                                    @foreach($medecine as $annonce)
                                                    <a class="home-suggest swiper-slide" href="{{ route('annonce.details', ['id' => $annonce->id]) }}" title="{{ $annonce->titre }}">
                                                        <div class="cover">
                                                            <img class="photo" src="{{ asset('storage/' . $annonce->photo) }}" alt="Concentrateur">
                                                        </div>
                                                        <div class="infos">
                                                            <div class="title">{{ $annonce->titre }}</div>
                                                            <div class="loc">{{ $annonce->ville }}</div>
                                                            <div><i class="fa fa-clock-o"></i>&nbsp;{{ $annonce->created_at->format('d M Y') }}</div>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                @else
                                                <p>Aucune annonce disponible pour cette catégorie.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-grid-nav swiper-suggest-next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="f-item text-center pa-md ma-md">
                                    <a href="{{ route('userAuth_medecine') }}" title="Voir tous les dons"><b>Voir plus de dons..</b></a>
                                </div>
                            </div>

                            <div class="f-container pa-xs ma-xs swiper-suggest">
                                <h2 class="text-center f-item"><b>Autres</b></h2>
                                <div class="swiper-grid f-item">
                                    <div class="swiper-grid-nav swiper-suggest-prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    </div>
                                    <div class="swiper-grid-content">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                @if($autre)
                                                    @foreach($autre as $annonce)
                                                    <a class="home-suggest swiper-slide" href="{{ route('annonce.details', ['id' => $annonce->id]) }}" title="{{ $annonce->titre }}">
                                                        <div class="cover">
                                                            <img class="photo" src="{{ asset('storage/' . $annonce->photo) }}">
                                                        </div>
                                                        <div class="infos">
                                                            <div class="title">{{ $annonce->titre }}</div>
                                                            <div class="loc">{{ $annonce->ville }}</div>
                                                            <div><i class="fa fa-clock-o"></i>&nbsp;{{ $annonce->created_at->format('d M Y') }}</div>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                @else
                                                <p>Aucune annonce disponible pour cette catégorie.</p>
                                                @endif
                                                <!-- Répétez ce bloc pour chaque catégorie -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-grid-nav swiper-suggest-next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="f-item text-center pa-md ma-md">
                                    <a href="{{ route('autre') }}" title="Voir tous les dons"><b>Voir plus de dons..</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-community pa-xs ma-xs">
                <div class="home-community-column home-community-first-panel f-grow-1">
                    <div class="home-community-mob-counter">
                        <div class="community-counter"></div>
                    </div>
                    <div class="home-give-link">
                        <img class="ijalimenbottomdroite" src="{{ asset('assets\images\homeImagefooterTabaraa1.svg') }}" width="390" height="250" alt=" ">
                    </div>
                </div>
                <div id="counter-holder" class="home-community-column">
                    <div class="community-counter"></div>
                    <img class="ijpetitbottomdroite" src="{{ asset('assets\images\homeImagefooterTabaraa2.svg') }}" width="457" height="290" alt=" ">
                </div>
            </div>
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
                <div class="page-bottom-illustrate">
                    <small><b>Tabaraa..</b><br>&nbsp;&nbsp;&nbsp;&nbsp;Ne vous encombrez pas de choses qui ne servent plus, donnez ! Meubles, vêtements... Offrez une deuxième vie à vos objets inutilisés; même abîmés, ils peuvent encore servir. Donnons les objets qui nous encombrent depuis tant de temps pour faire le bonheur de quelqu'un.</small>
                </div>
            </div>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
        <footer class="footer">
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>

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
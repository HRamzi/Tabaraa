<!DOCTYPE html>
<html lang="fr">

<head>

    <link rel="preload" as="font" href="/fonts/fontawesome-webfont.woff2?v=4.7.0" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="/fonts/icomoon4.woff2" type="font/woff2" crossorigin>
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
                                <img class="logo f-align-self-center" height="20" width="20"
                                    src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                            <a class="f-container logo-full" href="#" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="50" width="100" src="{{ asset('assets\images\Tabaraalogo.png') }}"
                                    loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                        </div>
                    </div>
                    <div class="f-grow-2 f-container f-wrap-nowrap f-align-center f-content-center">
                        <div class="header-search" id="header-search-loc">
                            <span class="header-search-resume">
                                <span class="header-search-resume-emphasis">Rechercher un don...</span>
                                <span class="header-search-resume-secondary"></span>
                            </span>
                            <button type="button" aria-label="Recherche"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-end">

                        <a class="repliable btn blue post-holder" href="{{ route('connexion') }}"
                            title="Publier une annonce pour donner un objet">
                            <i class="fa fa-plus"></i>
                            <span class="label">Créer une annonce</span>
                        </a>
                        <a id="header-login-btn" class="repliable tool" href="{{ route('connexion') }}">

                            <i class="fa fa-user fa"></i>
                            <span>Connexion</span>
                        </a>

                    </div>

                </div>


                <div class="f-container f-content-center spaced" id="global-search">
                    <div class="f-item">
                        <div id="search-header-appbar">
                            <button id="close-search-header"><i class="fa fa-chevron-left"></i></button>
                            <span>Ma recherche</span>
                        </div>
                        <div class="f-container pt-sm search-filter-zone text-sm">
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Que recherchez-vous
                                    ?</label>
                                <input class="select2" id="search-header-keywords" type="text" maxlength="20"
                                    placeholder="Table,Pull..." value="" />
                                <!-- <span class="search-header-reset-keywords disabled"><i class="fa fa-close"></i></span> -->
                            </div>
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Sur qulle ville ?</label>
                                <input class="select2" id="search-header-keywords" type="text" maxlength="50"
                                    placeholder="Tlemcen,Oran.." value="" />
                                <!-- <span class="search-header-reset-keywords disabled"><i class="fa fa-close"></i></span> -->
                            </div>
                            <div class="search-cell">
                                <button id="search-header-submit" class="search-valid search"
                                    data-target="#search-header-alert">
                                    <i class="fa fa-search"></i>
                                    RECHERCHER
                                    <!-- <span class="search-header-nb-results"></span> -->
                                    <div id="search-header-alert" class="text-xs text-center display-soft-none">
                                        Veuillez sélectionner au moins un critère ci-dessus
                                    </div>
                                </button>
                                <div class="pt-sm text-center bloc_saved_search has-recherches display-none">
                                    <button class="btn outline blue open-saved-search">Mes recherches</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="global-search-close" class="icon-btn blue"><i class="fa fa-arrow-up"></i></button>
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
            <a href="{{route('connexion')}}" title="Me connecter à mon compte"><i class="fa fa-user fa-lg"></i>&nbsp; &nbsp; Se
                connecter
            </a>
            <a href="{{route('inscription')}}" title="Créer un compte"><i class="fa-solid fa-user-plus fa-lg"></i>&nbsp; &nbsp;
                S'inscrire
            </a>
            <br>
            <span>Catégories</span>
            <a href="vetements" title="Me connecter à mon compte">&nbsp; &nbsp;<i
                    class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            <a href="Medecines" title="Créer un compte">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl"
                    style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            <a href="Livres" title="Créer un compte">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl"
                    style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            <a href="Articles Maison" title="Créer un compte">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg"
                    style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            <a href="Pièces Automobiles" title="Créer un compte">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl"
                    style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="Autres" title="Créer un compte">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl"
                    style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>

        </div>
    </div>
    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="container main-bg">
            <div class="f-container f-wrap-nowrap f-direction-column-reverse f-lg-direction-row">
                <div id="home" class="f-item pa-md pt-none">
                    <div class="home-community pa-md ma-md">
                        <div class="home-community-column home-community-first-panel f-grow-1 ">
                            <span class="headline">&nbsp;&nbsp;&nbsp;&nbsp;<i>Bienvenue sur le site de dons <b>Tabaraa
                                    </b>, où vous pouvez donner et trouver des objets autour de vous !</i></span>
                            <div class="home-community-mob-counter">
                                <div class=""></div>
                            </div>
                            <div class="home-give-link">
                                <img class="ijgauche" src="{{ asset('assets\images\livre.png') }}" loading="lazy" decoding="async" width="400"
                                    height="240" alt="imagedroiteLivreTabaraa">
                            </div>
                        </div>

                        <div id="counter-holder" class="home-community-column ">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <img class="ijdroite"
                                src="{{ asset('assets\images\vecteezy_don-de-vetements-partage-concept-d-espoir-vetements_11547755.jpg') }}"
                                loading="lazy" decoding="async" width="430" height="230"
                                alt="imagegauchevetementsTabaraa">

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
                                                <a class="home-category swiper-slide" href="Vetements"
                                                    title="Vêtements">
                                                    <img src="{{ asset('assets\images\vetements-masculins.png') }}" loading="lazy" height="100"
                                                        width="100" decoding="async">
                                                    <div class="infos">Vetements</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="Medecines"
                                                    title="Medecines">
                                                    <img src="{{ asset('assets\images\medicament.png') }}" loading="lazy" height="100"
                                                        width="100" decoding="async">
                                                    <div class="infos">Medecines</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="Meubles" title="Meubles">
                                                    <img src="{{ asset('assets\images\un-meuble.png') }}" loading="lazy" height="100"
                                                        width="100" decoding="async">
                                                    <div class="infos">Meubles</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="Livres" title="Livres">
                                                    <img src="{{ asset('assets\images\pile-de-livres.png') }}" loading="lazy" height="100"
                                                        width="100" decoding="async">
                                                    <div class="infos">Livres</div>
                                                </a>

                                                <a class="home-category swiper-slide" href="Pièces Automobiles"
                                                    title="Pièces Automobiles">
                                                    <img src="{{ asset('assets\images\voiture.png') }}" loading="lazy" height="100" width="100"
                                                        decoding="async">
                                                    <div class="infos">Pièces Automobiles</div>
                                                </a>
                                                <a class="home-category swiper-slide" href="Autres" title="Autres">
                                                    <img src="{{ asset('assets\images\autre (1).png') }}" loading="lazy" height="100"
                                                        width="100" decoding="async">
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
                                <h2 class="text-center f-item"><b>Vetements</b></h2>
                                <div class="swiper-grid f-item">
                                    <div class="swiper-grid-nav swiper-suggest-prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    </div>
                                    <div class="swiper-grid-content">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                <a class="home-suggest swiper-slide" href="annoncevetemnt1"
                                                    title="Pantalon">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\pontalon.jpg') }}" alt="pantalon">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Pontalon</div>
                                                        <div class="loc"> Oran</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;06 Mars 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncevetemnt2"
                                                    title="Pull">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\tricot.jpg') }}" alt="tricot">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">T-shirt</div>
                                                        <div class="loc"> Tlemcen</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;21 Fevrier 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncevetemnt3"
                                                    title="vestefemme">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\vestefemme.jpg') }}" alt="vestefemme">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Veste Femme</div>
                                                        <div class="loc"> Tlemcen</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;16 Avril 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncevetemnt4"
                                                    title="Chaussure">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\chaussure1.jpg') }}" alt="Chaussure">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Chaussure</div>
                                                        <div class="loc"> Alger</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;28 Mars 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncevetemnt4"
                                                    title="Veste Classique">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\vesteclassique.jpg') }}" alt="Veste Classique">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Veste Classique</div>
                                                        <div class="loc"> Sidi Bel abes</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;12 Fevrier 2024</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-grid-nav swiper-suggest-next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="f-item text-center pa-md ma-md">
                                    <a href="pagevetements" title="Voir tous les dons"><b>Voir plus de dons..</b></a>
                                </div>
                            </div>
                            <div class="f-container pa-xs ma-md swiper-suggest">
                                <h2 class="text-center f-item"><b>Medecines</b></h2>
                                <div class="swiper-grid f-item">
                                    <div class="swiper-grid-nav swiper-suggest-prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    </div>
                                    <div class="swiper-grid-content">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                <a class="home-suggest swiper-slide" href="annoncemedecine1"
                                                    title="Concentrateur">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\concentrateur-oxygene.jpg') }}" alt="Concentrateur">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Concentrateur d'oxygene</div>
                                                        <div class="loc"> Alger</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;09 Mars 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncemedecine2"
                                                    title="Tensiometre">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\appareil-attention.jpg') }}" alt="Tensiometre">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Tensiometre</div>
                                                        <div class="loc"> Tlemcen</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;04 Mai 2023</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncemedecine3"
                                                    title="medecamen1">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\medecamen1.jpg') }}" alt="medecamen1">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Imalek</div>
                                                        <div class="loc"> Alger</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;12 Avril 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncemedecine1"
                                                    title="medecamen2">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\download (4).jpg') }}">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title"> Tisane bébé</div>
                                                        <div class="loc"> Blida</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;08 Mai 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annoncemedecine1"
                                                    title="serum">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\medicine-ambulance-serum-18967.jpg') }}">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title"> Serum</div>
                                                        <div class="loc"> Annaba</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;20 Janvier 2024</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-grid-nav swiper-suggest-next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="f-item text-center pa-md ma-md">
                                    <a href="/Meubles" title="Voir tous les dons"><b>Voir plus de dons..</b></a>
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
                                                <a class="home-suggest swiper-slide" href="annonce1"
                                                    title="tapis-roulant">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\422917897_7146799912082775_5824628172342924713_n.jpg') }}">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Tapis roulant</div>
                                                        <div class="loc"> Ain Temouchent</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;24 Mars 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annonce2" title="tablet">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\1.jpg') }}">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Tablet</div>
                                                        <div class="loc"> Constatine</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;21 janvier 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annonce3" title="guitare">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\2.jpg') }}">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Guitare</div>
                                                        <div class="loc"> Tlemcen</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;23 Mai 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annonce4" title="Cartable">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\3.jpg.png') }}">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Cartable</div>
                                                        <div class="loc"> Tipaza</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;28 janvier 2024</div>
                                                    </div>
                                                </a>
                                                <a class="home-suggest swiper-slide" href="annonce5" title="chaise">
                                                    <div class="cover">
                                                        <img class="photo" loading="lazy" decoding="async"
                                                            src="{{ asset('assets\images\4.jpg') }}">
                                                    </div>
                                                    <div class="infos">
                                                        <div class="title">Chaise bureau</div>
                                                        <div class="loc"> Tipaza</div>
                                                        <div><i class="fa fa-clock-o"></i>&nbsp;2 janvier 2024</div>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-grid-nav swiper-suggest-next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="f-item text-center pa-md ma-md">
                                    <a href="/Meubles" title="Voir tous les dons"><b>Voir plus de dons..</b></a>
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
                        <img class="ijalimenbottomdroite" src="{{ asset('assets\images\don.png') }}" loading="lazy" decoding="async" width="390"
                            height="250" alt="La communauté de Donnons.org">
                    </div>
                </div>
                <div id="counter-holder" class="home-community-column">
                    <div class="community-counter"></div>
                    <img class="ijpetitbottomdroite" src="{{ asset('assets\images\petit.png') }}" loading="lazy" decoding="async" width="457"
                        height="290" alt="La communauté de Donnons.org">
                </div>
            </div>
        </div>
        <div id="dbalpha"></div>
        <div id="dialogBoxContent"></div>
        <div id="toast-box"></div>
        <div class="page-bottom">
            <div class="container">
                <div class="page-bottom-promote">
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }}"
                        loading="lazy" decoding="async" alt="Donnons.org" /><br>
                    <span class="pt-none mt-none ml-none"><span class="text-orange">Nous donnons des dons à toutes
                        </span>
                        &nbsp;
                        <span class="text-blue-light">personnes étant dans le besoin</span></span>
                </div>
                <div class="page-bottom-illustrate">
                    <small><b>Tabaraa..</b><br>&nbsp;&nbsp;&nbsp;&nbsp;Ne vous encombrez pas de choses qui ne servent
                        plus, donnez ! Meubles, vêtements... Offrez une deuxième vie à vos objets inutilisés; même
                        abîmés, ils peuvent encore servir. Donnons les objets qui nous encombrent depuis tant de temps
                        pour faire le bonheur de quelqu'un.</small>
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
                <li class="menu__item"><a class="menu__link" href="#">A propos</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Services</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>

            </ul>
            <p>&copy;2024 Tabaraa | Tous droits réservés</p>
        </footer>

        <script>var $globals = { "lastNotifsCheck": 1709241572, "adsense": null, "yldv2": null, "sopheosTest": null, "env": "prod", "anti_adblock": false, "uri": "", "url": "https:\/\/donnons.org", "current": "https:\/\/donnons.org", "COOKIE_Prefix": "canopus_", "consentManagement": null, "disable_sw": false, "categories": [{ "cat_id": 29, "cat_alias": "Alimentaire", "cat_libelle": "Alimentaire", "cat_ref_sing": "alimentaire", "cat_ref_plur": "alimentaires", "filtres": { "34": { "filtre_id": 34, "filtre_libelle": "Type", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 29, "valeurs": { "158": { "valeur_id": 158, "valeur_libelle": "Un fruit ou un l\u00e9gume", "valeur_libelle_public": "Fruits et l\u00e9gumes", "valeur_filtre": 34, "valeur_ordre": 1, "valeur_searchable": 1 }, "159": { "valeur_id": 159, "valeur_libelle": "Une conserve, de l\u2019\u00e9picerie emball\u00e9e non entam\u00e9s avec DLC (Date Limite de Consommation) non d\u00e9pass\u00e9e", "valeur_libelle_public": "Autres dons alimentaires", "valeur_filtre": 34, "valeur_ordre": 2, "valeur_searchable": 1 } } } } }, { "cat_id": 28, "cat_alias": "Accessoires-de-mode", "cat_libelle": "Accessoires de mode", "cat_ref_sing": "accessoire de mode", "cat_ref_plur": "accessoires de mode", "filtres": { "33": { "filtre_id": 33, "filtre_libelle": "Que donnez-vous ?", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 28, "valeurs": { "154": { "valeur_id": 154, "valeur_libelle": "Montres et bijoux", "valeur_libelle_public": "Montres et bijoux", "valeur_filtre": 33, "valeur_ordre": 1, "valeur_searchable": 1 }, "155": { "valeur_id": 155, "valeur_libelle": "Sacs \/ maroquinerie", "valeur_libelle_public": "Sacs \/ maroquinerie", "valeur_filtre": 33, "valeur_ordre": 2, "valeur_searchable": 1 }, "156": { "valeur_id": 156, "valeur_libelle": "Autres accessoires", "valeur_libelle_public": "Autres accessoires", "valeur_filtre": 33, "valeur_ordre": 3, "valeur_searchable": 1 } } } } }, { "cat_id": 1, "cat_alias": "Accessoires-et-alimentation-animaux", "cat_libelle": "Accessoires et alimentation pour animaux", "cat_ref_sing": "mat\u00e9riel pour animaux", "cat_ref_plur": "mat\u00e9riel pour animaux", "filtres": { "1": { "filtre_id": 1, "filtre_libelle": "Choisissez un type", "filtre_libelle_public": "Type", "filtre_ordre": 1, "filtre_categorie": 1, "valeurs": { "1": { "valeur_id": 1, "valeur_libelle": "Alimentation pour animaux", "valeur_libelle_public": "Alimentation", "valeur_filtre": 1, "valeur_ordre": 1, "valeur_searchable": 1 }, "123": { "valeur_id": 123, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 1, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 3, "cat_alias": "Auto-Moto-Vehicules", "cat_libelle": "Auto \/ Moto \/ V\u00e9hicules", "cat_ref_sing": "mat\u00e9riel auto moto", "cat_ref_plur": "mat\u00e9riel auto moto", "filtres": { "3": { "filtre_id": 3, "filtre_libelle": "Le don est", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 3, "valeurs": { "7": { "valeur_id": 7, "valeur_libelle": "un v\u00e9hicule", "valeur_libelle_public": "V\u00e9hicules", "valeur_filtre": 3, "valeur_ordre": 1, "valeur_searchable": 1 }, "8": { "valeur_id": 8, "valeur_libelle": "une pi\u00e8ce d\u00e9tach\u00e9e", "valeur_libelle_public": "Pi\u00e8ces d\u00e9tach\u00e9es", "valeur_filtre": 3, "valeur_ordre": 2, "valeur_searchable": 1 }, "9": { "valeur_id": 9, "valeur_libelle": "un accessoire", "valeur_libelle_public": "Accessoires", "valeur_filtre": 3, "valeur_ordre": 3, "valeur_searchable": 1 } } }, "2": { "filtre_id": 2, "filtre_libelle": "Il concerne", "filtre_libelle_public": "Type de v\u00e9hicule", "filtre_ordre": 2, "filtre_categorie": 3, "valeurs": { "3": { "valeur_id": 3, "valeur_libelle": "une voiture", "valeur_libelle_public": "Voitures", "valeur_filtre": 2, "valeur_ordre": 1, "valeur_searchable": 1 }, "4": { "valeur_id": 4, "valeur_libelle": "un 2 roues motoris\u00e9", "valeur_libelle_public": "2 roues motoris\u00e9s", "valeur_filtre": 2, "valeur_ordre": 2, "valeur_searchable": 1 }, "5": { "valeur_id": 5, "valeur_libelle": "une caravane ou une remorque", "valeur_libelle_public": "Caravanes \/ Remorques", "valeur_filtre": 2, "valeur_ordre": 3, "valeur_searchable": 1 }, "6": { "valeur_id": 6, "valeur_libelle": "un autre v\u00e9hicule", "valeur_libelle_public": "Autres v\u00e9hicules", "valeur_filtre": 2, "valeur_ordre": 4, "valeur_searchable": 1 } } } } }, { "cat_id": 4, "cat_alias": "Beaute-Soins-du-corps", "cat_libelle": "Beaut\u00e9 \/ Soins du corps", "cat_ref_sing": "accessoires de beaut\u00e9", "cat_ref_plur": "accessoires de beaut\u00e9", "filtres": { "4": { "filtre_id": 4, "filtre_libelle": "Choisissez un type", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 4, "valeurs": { "10": { "valeur_id": 10, "valeur_libelle": "Coiffure", "valeur_libelle_public": "Coiffure", "valeur_filtre": 4, "valeur_ordre": 1, "valeur_searchable": 1 }, "162": { "valeur_id": 162, "valeur_libelle": "Produits de beaut\u00e9", "valeur_libelle_public": "Produits de beaut\u00e9", "valeur_filtre": 4, "valeur_ordre": 2, "valeur_searchable": 1 }, "124": { "valeur_id": 124, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 4, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 6, "cat_alias": "Bricolage-Construction-et-renovation", "cat_libelle": "Bricolage \/ Construction et r\u00e9novation", "cat_ref_sing": "mat\u00e9riel de bricolage", "cat_ref_plur": "mat\u00e9riel de bricolage", "filtres": { "5": { "filtre_id": 5, "filtre_libelle": "Quel type de mat\u00e9riel ?", "filtre_libelle_public": "Type", "filtre_ordre": 1, "filtre_categorie": 6, "valeurs": { "11": { "valeur_id": 11, "valeur_libelle": "Mat\u00e9riaux pour le gros oeuvre ou l\u0027isolation", "valeur_libelle_public": "Mat\u00e9riaux \/ gros oeuvre \/ isolation", "valeur_filtre": 5, "valeur_ordre": 1, "valeur_searchable": 1 }, "12": { "valeur_id": 12, "valeur_libelle": "Outillage", "valeur_libelle_public": "Outillage", "valeur_filtre": 5, "valeur_ordre": 2, "valeur_searchable": 1 }, "14": { "valeur_id": 14, "valeur_libelle": "Mat\u00e9riel d\u0027\u00e9lectricit\u00e9", "valeur_libelle_public": "\u00c9lectricit\u00e9", "valeur_filtre": 5, "valeur_ordre": 3, "valeur_searchable": 1 }, "15": { "valeur_id": 15, "valeur_libelle": "Sanitaire ou plomberie", "valeur_libelle_public": "Sanitaire \/ plomberie", "valeur_filtre": 5, "valeur_ordre": 4, "valeur_searchable": 1 }, "16": { "valeur_id": 16, "valeur_libelle": "Chauffage", "valeur_libelle_public": "Chauffage", "valeur_filtre": 5, "valeur_ordre": 5, "valeur_searchable": 1 }, "17": { "valeur_id": 17, "valeur_libelle": "Porte, fen\u00eatre ou volet", "valeur_libelle_public": "Fermetures (portes, fen\u00eatres\u2026)", "valeur_filtre": 5, "valeur_ordre": 6, "valeur_searchable": 1 }, "18": { "valeur_id": 18, "valeur_libelle": "Quincaillerie ou visserie", "valeur_libelle_public": "Quincaillerie \/ visserie", "valeur_filtre": 5, "valeur_ordre": 7, "valeur_searchable": 1 }, "19": { "valeur_id": 19, "valeur_libelle": "Murs et sols (am\u00e9nagement, d\u00e9co)", "valeur_libelle_public": "Murs et sols (am\u00e9nagement, d\u00e9co)", "valeur_filtre": 5, "valeur_ordre": 8, "valeur_searchable": 1 }, "145": { "valeur_id": 145, "valeur_libelle": "Cartons et boites de rangement", "valeur_libelle_public": "Cartons et boites de rangement", "valeur_filtre": 5, "valeur_ordre": 9, "valeur_searchable": 1 } } } } }, { "cat_id": 27, "cat_alias": "Chaussures", "cat_libelle": "Chaussures", "cat_ref_sing": "chaussure", "cat_ref_plur": "chaussures", "filtres": [] }, { "cat_id": 7, "cat_alias": "Collection", "cat_libelle": "Collection", "cat_ref_sing": "objet de collection", "cat_ref_plur": "objets de collection", "filtres": { "7": { "filtre_id": 7, "filtre_libelle": "Type d\u0027objet de collection", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 7, "valeurs": { "21": { "valeur_id": 21, "valeur_libelle": "Cartes et vignettes", "valeur_libelle_public": "Cartes et vignettes", "valeur_filtre": 7, "valeur_ordre": 1, "valeur_searchable": 1 }, "112": { "valeur_id": 112, "valeur_libelle": "Timbres", "valeur_libelle_public": "Timbres", "valeur_filtre": 7, "valeur_ordre": 2, "valeur_searchable": 1 }, "125": { "valeur_id": 125, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 7, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 2, "cat_alias": "Cuisine-et-arts-la-table", "cat_libelle": "Cuisine et arts de la table", "cat_ref_sing": "mobilier de cuisine et vaisselle", "cat_ref_plur": "mobilier de cuisine et vaisselle", "filtres": { "24": { "filtre_id": 24, "filtre_libelle": "Que donnez-vous ?", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 2, "valeurs": { "99": { "valeur_id": 99, "valeur_libelle": "Une casserole ou un plat de cuisson", "valeur_libelle_public": "Casseroles et plats de cuisson", "valeur_filtre": 24, "valeur_ordre": 1, "valeur_searchable": 1 }, "117": { "valeur_id": 117, "valeur_libelle": "De la vaisselle", "valeur_libelle_public": "Vaisselle", "valeur_filtre": 24, "valeur_ordre": 2, "valeur_searchable": 1 }, "101": { "valeur_id": 101, "valeur_libelle": "Un ustensile de cuisine", "valeur_libelle_public": "Ustensiles de cuisine", "valeur_filtre": 24, "valeur_ordre": 3, "valeur_searchable": 1 }, "100": { "valeur_id": 100, "valeur_libelle": "Du mat\u00e9riel de conservation, de rangement", "valeur_libelle_public": "Conservation et rangements", "valeur_filtre": 24, "valeur_ordre": 4, "valeur_searchable": 1 }, "116": { "valeur_id": 116, "valeur_libelle": "Du linge de table", "valeur_libelle_public": "Linge de table", "valeur_filtre": 24, "valeur_ordre": 5, "valeur_searchable": 1 }, "134": { "valeur_id": 134, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 24, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 25, "cat_alias": "Decoration", "cat_libelle": "D\u00e9coration", "cat_ref_sing": "objet de d\u00e9co d\u0027int\u00e9rieur", "cat_ref_plur": "objets de d\u00e9co d\u0027int\u00e9rieur", "filtres": { "30": { "filtre_id": 30, "filtre_libelle": "Que donnez-vous ?", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 25, "valeurs": { "157": { "valeur_id": 157, "valeur_libelle": "Une d\u00e9coration murale", "valeur_libelle_public": "D\u00e9corations murales", "valeur_filtre": 30, "valeur_ordre": 1, "valeur_searchable": 1 }, "140": { "valeur_id": 140, "valeur_libelle": "Un luminaire", "valeur_libelle_public": "Luminaires", "valeur_filtre": 30, "valeur_ordre": 2, "valeur_searchable": 1 }, "141": { "valeur_id": 141, "valeur_libelle": "Des rideaux", "valeur_libelle_public": "Rideaux", "valeur_filtre": 30, "valeur_ordre": 3, "valeur_searchable": 1 }, "142": { "valeur_id": 142, "valeur_libelle": "Un tapis", "valeur_libelle_public": "Tapis", "valeur_filtre": 30, "valeur_ordre": 4, "valeur_searchable": 1 }, "143": { "valeur_id": 143, "valeur_libelle": "Un bibelot", "valeur_libelle_public": "Bibelots", "valeur_filtre": 30, "valeur_ordre": 5, "valeur_searchable": 1 }, "144": { "valeur_id": 144, "valeur_libelle": "Une horloge ou pendule", "valeur_libelle_public": "Horloges ou pendules", "valeur_filtre": 30, "valeur_ordre": 6, "valeur_searchable": 1 }, "161": { "valeur_id": 161, "valeur_libelle": "D\u00e9coration festive", "valeur_libelle_public": "D\u00e9coration festive", "valeur_filtre": 30, "valeur_ordre": 7, "valeur_searchable": 1 } } } } }, { "cat_id": 9, "cat_alias": "Electromenager", "cat_libelle": "\u00c9lectrom\u00e9nager", "cat_ref_sing": "\u00e9lectrom\u00e9nager", "cat_ref_plur": "\u00e9lectrom\u00e9nager", "filtres": { "8": { "filtre_id": 8, "filtre_libelle": "Type d\u0027\u00e9lectrom\u00e9nager", "filtre_libelle_public": "Type d\u0027\u00e9lectrom\u00e9nager", "filtre_ordre": 1, "filtre_categorie": 9, "valeurs": { "22": { "valeur_id": 22, "valeur_libelle": "Cuisson", "valeur_libelle_public": "Cuisson", "valeur_filtre": 8, "valeur_ordre": 1, "valeur_searchable": 1 }, "23": { "valeur_id": 23, "valeur_libelle": "Froid", "valeur_libelle_public": "Froid", "valeur_filtre": 8, "valeur_ordre": 2, "valeur_searchable": 1 }, "24": { "valeur_id": 24, "valeur_libelle": "Lavage", "valeur_libelle_public": "Lavage", "valeur_filtre": 8, "valeur_ordre": 3, "valeur_searchable": 1 }, "25": { "valeur_id": 25, "valeur_libelle": "Cuisine", "valeur_libelle_public": "Cuisine", "valeur_filtre": 8, "valeur_ordre": 4, "valeur_searchable": 1 }, "26": { "valeur_id": 26, "valeur_libelle": "Beaut\u00e9 \/ Forme \/ Sant\u00e9", "valeur_libelle_public": "Beaut\u00e9 \/ Forme \/ Sant\u00e9", "valeur_filtre": 8, "valeur_ordre": 5, "valeur_searchable": 1 }, "27": { "valeur_id": 27, "valeur_libelle": "Entretien maison et soin du linge", "valeur_libelle_public": "Entretien maison et soin du linge", "valeur_filtre": 8, "valeur_ordre": 6, "valeur_searchable": 1 } } } } }, { "cat_id": 10, "cat_alias": "Entretien-de-la-maison-accessoires-et-produits", "cat_libelle": "Entretien de la maison : accessoires et produits", "cat_ref_sing": "mat\u00e9riel d\u0027entretien", "cat_ref_plur": "mat\u00e9riel d\u0027entretien", "filtres": { "29": { "filtre_id": 29, "filtre_libelle": "Que donnez-vous ?", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 10, "valeurs": { "115": { "valeur_id": 115, "valeur_libelle": "Un produit", "valeur_libelle_public": "Produits", "valeur_filtre": 29, "valeur_ordre": 1, "valeur_searchable": 1 }, "160": { "valeur_id": 160, "valeur_libelle": "Accessoires", "valeur_libelle_public": "Accessoires", "valeur_filtre": 29, "valeur_ordre": 2, "valeur_searchable": 1 }, "136": { "valeur_id": 136, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 29, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 12, "cat_alias": "Jardin-amenagement-exterieur", "cat_libelle": "Jardin \/ am\u00e9nagement ext\u00e9rieur", "cat_ref_sing": "mat\u00e9riel de jardin et d\u0027am\u00e9nagement", "cat_ref_plur": "mat\u00e9riel de jardin et d\u0027am\u00e9nagement", "filtres": { "11": { "filtre_id": 11, "filtre_libelle": "Que donnez-vous ?", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 12, "valeurs": { "30": { "valeur_id": 30, "valeur_libelle": "Une plante ou un arbre", "valeur_libelle_public": "Plantes et arbres", "valeur_filtre": 11, "valeur_ordre": 1, "valeur_searchable": 1 }, "31": { "valeur_id": 31, "valeur_libelle": "De l\u0027outillage pour l\u0027entretien", "valeur_libelle_public": "Outillage et entretien", "valeur_filtre": 11, "valeur_ordre": 2, "valeur_searchable": 1 }, "32": { "valeur_id": 32, "valeur_libelle": "De la terre ou de l\u0027engrais", "valeur_libelle_public": "Terre et engrais", "valeur_filtre": 11, "valeur_ordre": 3, "valeur_searchable": 1 }, "33": { "valeur_id": 33, "valeur_libelle": "Du mat\u00e9riel\/mat\u00e9riaux pour l\u0027am\u00e9nagement", "valeur_libelle_public": "Am\u00e9nagement", "valeur_filtre": 11, "valeur_ordre": 4, "valeur_searchable": 1 }, "34": { "valeur_id": 34, "valeur_libelle": "Du mobilier de jardin", "valeur_libelle_public": "Mobilier de jardin", "valeur_filtre": 11, "valeur_ordre": 5, "valeur_searchable": 1 }, "139": { "valeur_id": 139, "valeur_libelle": "Graines et bulbes", "valeur_libelle_public": "Graines et bulbes", "valeur_filtre": 11, "valeur_ordre": 6, "valeur_searchable": 1 }, "127": { "valeur_id": 127, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 11, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 13, "cat_alias": "Jeux-et-jouets", "cat_libelle": "Jeux et jouets", "cat_ref_sing": "jouet", "cat_ref_plur": "jouets", "filtres": { "12": { "filtre_id": 12, "filtre_libelle": "Quel type de jouet ?", "filtre_libelle_public": "Type de jouet", "filtre_ordre": 1, "filtre_categorie": 13, "valeurs": { "35": { "valeur_id": 35, "valeur_libelle": "Un jeu d\u2019\u00e9veil", "valeur_libelle_public": "Jeux d\u2019\u00e9veil", "valeur_filtre": 12, "valeur_ordre": 1, "valeur_searchable": 1 }, "36": { "valeur_id": 36, "valeur_libelle": "Un jeu de soci\u00e9t\u00e9", "valeur_libelle_public": "Jeux de soci\u00e9t\u00e9", "valeur_filtre": 12, "valeur_ordre": 2, "valeur_searchable": 1 }, "37": { "valeur_id": 37, "valeur_libelle": "Un jeu de construction", "valeur_libelle_public": "Jeux de construction", "valeur_filtre": 12, "valeur_ordre": 3, "valeur_searchable": 1 }, "39": { "valeur_id": 39, "valeur_libelle": "Une poup\u00e9e ou peluche", "valeur_libelle_public": "Poup\u00e9es, peluches", "valeur_filtre": 12, "valeur_ordre": 4, "valeur_searchable": 1 }, "40": { "valeur_id": 40, "valeur_libelle": "Une voiture, un circuit", "valeur_libelle_public": "Voitures, circuits", "valeur_filtre": 12, "valeur_ordre": 5, "valeur_searchable": 1 }, "128": { "valeur_id": 128, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 12, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 14, "cat_alias": "Linge-de-maison", "cat_libelle": "Linge de maison", "cat_ref_sing": "linge de maison", "cat_ref_plur": "linge de maison", "filtres": { "13": { "filtre_id": 13, "filtre_libelle": "Quel type de linge ?", "filtre_libelle_public": "Type de linge", "filtre_ordre": 1, "filtre_categorie": 14, "valeurs": { "44": { "valeur_id": 44, "valeur_libelle": "Du linge de toilette", "valeur_libelle_public": "Linge de toilette", "valeur_filtre": 13, "valeur_ordre": 1, "valeur_searchable": 1 }, "45": { "valeur_id": 45, "valeur_libelle": "Du linge de lit", "valeur_libelle_public": "Linge de lit", "valeur_filtre": 13, "valeur_ordre": 2, "valeur_searchable": 1 }, "129": { "valeur_id": 129, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 13, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 15, "cat_alias": "Livres-Magazines", "cat_libelle": "Livres \/ Magazines", "cat_ref_sing": "livre", "cat_ref_plur": "livres", "filtres": { "14": { "filtre_id": 14, "filtre_libelle": "Quel genre de livre ?", "filtre_libelle_public": "Genre", "filtre_ordre": 1, "filtre_categorie": 15, "valeurs": { "46": { "valeur_id": 46, "valeur_libelle": "BD et jeunesse", "valeur_libelle_public": "BD et jeunesse", "valeur_filtre": 14, "valeur_ordre": 1, "valeur_searchable": 1 }, "47": { "valeur_id": 47, "valeur_libelle": "Litt\u00e9rature et fiction", "valeur_libelle_public": "Litt\u00e9rature et fiction", "valeur_filtre": 14, "valeur_ordre": 2, "valeur_searchable": 1 }, "48": { "valeur_id": 48, "valeur_libelle": "Art, culture et soci\u00e9t\u00e9", "valeur_libelle_public": "Art, culture et soci\u00e9t\u00e9", "valeur_filtre": 14, "valeur_ordre": 3, "valeur_searchable": 1 }, "49": { "valeur_id": 49, "valeur_libelle": "Vie pratique, cuisine, bricolage ", "valeur_libelle_public": "Vie pratique, cuisine, bricolage ", "valeur_filtre": 14, "valeur_ordre": 4, "valeur_searchable": 1 }, "50": { "valeur_id": 50, "valeur_libelle": "Nature, loisirs, sport", "valeur_libelle_public": "Nature, loisirs, sport", "valeur_filtre": 14, "valeur_ordre": 5, "valeur_searchable": 1 }, "51": { "valeur_id": 51, "valeur_libelle": "Scolaire, universitaire", "valeur_libelle_public": "Scolaire, universitaire", "valeur_filtre": 14, "valeur_ordre": 6, "valeur_searchable": 1 }, "52": { "valeur_id": 52, "valeur_libelle": "Savoir, dictionnaire, sciences", "valeur_libelle_public": "Savoir, dictionnaire, sciences", "valeur_filtre": 14, "valeur_ordre": 7, "valeur_searchable": 1 }, "53": { "valeur_id": 53, "valeur_libelle": "Tourisme", "valeur_libelle_public": "Tourisme", "valeur_filtre": 14, "valeur_ordre": 8, "valeur_searchable": 1 }, "54": { "valeur_id": 54, "valeur_libelle": "Presse", "valeur_libelle_public": "Presse", "valeur_filtre": 14, "valeur_ordre": 9, "valeur_searchable": 1 }, "55": { "valeur_id": 55, "valeur_libelle": "Notice", "valeur_libelle_public": "Notices", "valeur_filtre": 14, "valeur_ordre": 10, "valeur_searchable": 1 }, "56": { "valeur_id": 56, "valeur_libelle": "Livre en langue \u00e9trang\u00e8re", "valeur_libelle_public": "En langue \u00e9trang\u00e8re", "valeur_filtre": 14, "valeur_ordre": 11, "valeur_searchable": 1 } } } } }, { "cat_id": 22, "cat_alias": "Loisirs", "cat_libelle": "Loisirs", "cat_ref_sing": "objet pour le loisir", "cat_ref_plur": "objets pour le loisir", "filtres": { "28": { "filtre_id": 28, "filtre_libelle": "choisissez le type de loisir ?", "filtre_libelle_public": "Type de loisir", "filtre_ordre": 1, "filtre_categorie": 22, "valeurs": { "38": { "valeur_id": 38, "valeur_libelle": "Musique (instruments, mat\u00e9riel)", "valeur_libelle_public": "Musique (instruments, mat\u00e9riel)", "valeur_filtre": 28, "valeur_ordre": 1, "valeur_searchable": 1 }, "41": { "valeur_id": 41, "valeur_libelle": "Camping et voyage", "valeur_libelle_public": "Camping et voyage", "valeur_filtre": 28, "valeur_ordre": 2, "valeur_searchable": 1 }, "42": { "valeur_id": 42, "valeur_libelle": "Loisir cr\u00e9atif", "valeur_libelle_public": "Loisirs cr\u00e9atifs", "valeur_filtre": 28, "valeur_ordre": 3, "valeur_searchable": 1 }, "113": { "valeur_id": 113, "valeur_libelle": "Loisir d\u0027ext\u00e9rieur", "valeur_libelle_public": "Loisirs d\u0027ext\u00e9rieur", "valeur_filtre": 28, "valeur_ordre": 4, "valeur_searchable": 1 }, "146": { "valeur_id": 146, "valeur_libelle": "Billetterie", "valeur_libelle_public": "Billetterie", "valeur_filtre": 28, "valeur_ordre": 6, "valeur_searchable": 1 }, "135": { "valeur_id": 135, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 28, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 16, "cat_alias": "Materiel-de-bureau-scolaire", "cat_libelle": "Mat\u00e9riel de bureau \/ scolaire", "cat_ref_sing": "mat\u00e9riel scolaire ou de bureau", "cat_ref_plur": "mat\u00e9riel scolaire ou de bureau", "filtres": { "16": { "filtre_id": 16, "filtre_libelle": "Quel type de mat\u00e9riel ?", "filtre_libelle_public": "Type de mat\u00e9riel", "filtre_ordre": 1, "filtre_categorie": 16, "valeurs": { "57": { "valeur_id": 57, "valeur_libelle": "De la papeterie", "valeur_libelle_public": "Papeterie", "valeur_filtre": 16, "valeur_ordre": 1, "valeur_searchable": 1 }, "58": { "valeur_id": 58, "valeur_libelle": "Un cartable ou une trousse", "valeur_libelle_public": "Cartables \/ trousses", "valeur_filtre": 16, "valeur_ordre": 2, "valeur_searchable": 1 }, "59": { "valeur_id": 59, "valeur_libelle": "Des fournitures de bureau", "valeur_libelle_public": "Fournitures de bureau", "valeur_filtre": 16, "valeur_ordre": 3, "valeur_searchable": 1 }, "130": { "valeur_id": 130, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 16, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 17, "cat_alias": "Materiel-specialise", "cat_libelle": "Mat\u00e9riel sp\u00e9cialis\u00e9", "cat_ref_sing": "mat\u00e9riel sp\u00e9cialis\u00e9", "cat_ref_plur": "mat\u00e9riel sp\u00e9cialis\u00e9", "filtres": { "17": { "filtre_id": 17, "filtre_libelle": "Domaine d\u0027activit\u00e9", "filtre_libelle_public": "Domaine d\u0027activit\u00e9", "filtre_ordre": 1, "filtre_categorie": 17, "valeurs": { "61": { "valeur_id": 61, "valeur_libelle": "Agriculture", "valeur_libelle_public": "Agriculture", "valeur_filtre": 17, "valeur_ordre": 1, "valeur_searchable": 1 }, "62": { "valeur_id": 62, "valeur_libelle": "M\u00e9dical, param\u00e9dical", "valeur_libelle_public": "M\u00e9dical, param\u00e9dical", "valeur_filtre": 17, "valeur_ordre": 2, "valeur_searchable": 1 }, "63": { "valeur_id": 63, "valeur_libelle": "Industrie", "valeur_libelle_public": "Industrie", "valeur_filtre": 17, "valeur_ordre": 3, "valeur_searchable": 1 }, "131": { "valeur_id": 131, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 17, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 24, "cat_alias": "Meubles", "cat_libelle": "Meubles", "cat_ref_sing": "meuble et mobilier", "cat_ref_plur": "meubles et mobilier", "filtres": [] }, { "cat_id": 19, "cat_alias": "Multimedia-High-tech", "cat_libelle": "Multim\u00e9dia \/ High tech", "cat_ref_sing": "mat\u00e9riel informatique, hi-fi, audio ou vid\u00e9o", "cat_ref_plur": "mat\u00e9riel informatique, hi-fi, audio ou vid\u00e9o", "filtres": { "20": { "filtre_id": 20, "filtre_libelle": "Quel type d\u0027objet ?", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 19, "valeurs": { "76": { "valeur_id": 76, "valeur_libelle": "CD, cassette audio, vinyle", "valeur_libelle_public": "CD, cassettes audio, vinyles", "valeur_filtre": 20, "valeur_ordre": 1, "valeur_searchable": 1 }, "77": { "valeur_id": 77, "valeur_libelle": "VHS, DVD, Blu-ray", "valeur_libelle_public": "VHS, DVD, Blu-ray", "valeur_filtre": 20, "valeur_ordre": 2, "valeur_searchable": 1 }, "78": { "valeur_id": 78, "valeur_libelle": "Informatique", "valeur_libelle_public": "Informatique", "valeur_filtre": 20, "valeur_ordre": 3, "valeur_searchable": 1 }, "79": { "valeur_id": 79, "valeur_libelle": "Objet connect\u00e9", "valeur_libelle_public": "Objets connect\u00e9s", "valeur_filtre": 20, "valeur_ordre": 4, "valeur_searchable": 1 }, "80": { "valeur_id": 80, "valeur_libelle": "Hifi \/ audio", "valeur_libelle_public": "Hifi \/ audio", "valeur_filtre": 20, "valeur_ordre": 5, "valeur_searchable": 1 }, "81": { "valeur_id": 81, "valeur_libelle": "Vid\u00e9o \/ TV", "valeur_libelle_public": "Vid\u00e9o \/ TV", "valeur_filtre": 20, "valeur_ordre": 6, "valeur_searchable": 1 }, "82": { "valeur_id": 82, "valeur_libelle": "Mat\u00e9riel photo", "valeur_libelle_public": "Mat\u00e9riel photo", "valeur_filtre": 20, "valeur_ordre": 7, "valeur_searchable": 1 }, "83": { "valeur_id": 83, "valeur_libelle": "Console ou jeu vid\u00e9o", "valeur_libelle_public": "Consoles \/ jeux vid\u00e9o", "valeur_filtre": 20, "valeur_ordre": 8, "valeur_searchable": 1 }, "84": { "valeur_id": 84, "valeur_libelle": "R\u00e9veil", "valeur_libelle_public": "R\u00e9veils", "valeur_filtre": 20, "valeur_ordre": 9, "valeur_searchable": 1 }, "111": { "valeur_id": 111, "valeur_libelle": "T\u00e9l\u00e9phone ou fax", "valeur_libelle_public": "T\u00e9l\u00e9phones, fax", "valeur_filtre": 20, "valeur_ordre": 10, "valeur_searchable": 1 }, "132": { "valeur_id": 132, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 20, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 20, "cat_alias": "Puericulture", "cat_libelle": "Pu\u00e9riculture", "cat_ref_sing": "mat\u00e9riel de pu\u00e9riculture pour b\u00e9b\u00e9", "cat_ref_plur": "mat\u00e9riel de pu\u00e9riculture pour b\u00e9b\u00e9", "filtres": { "21": { "filtre_id": 21, "filtre_libelle": "Objet pour", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 20, "valeurs": { "85": { "valeur_id": 85, "valeur_libelle": "le sommeil", "valeur_libelle_public": "Sommeil", "valeur_filtre": 21, "valeur_ordre": 1, "valeur_searchable": 1 }, "86": { "valeur_id": 86, "valeur_libelle": "la promenade", "valeur_libelle_public": "Promenade", "valeur_filtre": 21, "valeur_ordre": 2, "valeur_searchable": 1 }, "87": { "valeur_id": 87, "valeur_libelle": "la toilette de b\u00e9b\u00e9", "valeur_libelle_public": "Toilette", "valeur_filtre": 21, "valeur_ordre": 3, "valeur_searchable": 1 }, "88": { "valeur_id": 88, "valeur_libelle": "le repas", "valeur_libelle_public": "Repas", "valeur_filtre": 21, "valeur_ordre": 4, "valeur_searchable": 1 }, "119": { "valeur_id": 119, "valeur_libelle": "la s\u00e9curit\u00e9", "valeur_libelle_public": "S\u00e9curit\u00e9", "valeur_filtre": 21, "valeur_ordre": 5, "valeur_searchable": 1 } } } } }, { "cat_id": 21, "cat_alias": "Sport", "cat_libelle": "Sport", "cat_ref_sing": "mat\u00e9riel de sport", "cat_ref_plur": "mat\u00e9riel de sport", "filtres": { "22": { "filtre_id": 22, "filtre_libelle": "Quel type d\u0027objet sportif ?", "filtre_libelle_public": "", "filtre_ordre": 1, "filtre_categorie": 21, "valeurs": { "89": { "valeur_id": 89, "valeur_libelle": "Un v\u00eatement", "valeur_libelle_public": "V\u00eatements", "valeur_filtre": 22, "valeur_ordre": 1, "valeur_searchable": 1 }, "90": { "valeur_id": 90, "valeur_libelle": "Un mat\u00e9riel", "valeur_libelle_public": "Mat\u00e9riel", "valeur_filtre": 22, "valeur_ordre": 2, "valeur_searchable": 1 } } }, "23": { "filtre_id": 23, "filtre_libelle": "Pour quel type de sport ?", "filtre_libelle_public": "Type de sport", "filtre_ordre": 2, "filtre_categorie": 21, "valeurs": { "91": { "valeur_id": 91, "valeur_libelle": "Cyclisme et v\u00e9lo", "valeur_libelle_public": "Cyclisme et v\u00e9lo", "valeur_filtre": 23, "valeur_ordre": 1, "valeur_searchable": 1 }, "92": { "valeur_id": 92, "valeur_libelle": "Sport nautique", "valeur_libelle_public": "Sport nautique", "valeur_filtre": 23, "valeur_ordre": 2, "valeur_searchable": 1 }, "93": { "valeur_id": 93, "valeur_libelle": "Musculation \/ fitness", "valeur_libelle_public": "Musculation \/ fitness", "valeur_filtre": 23, "valeur_ordre": 3, "valeur_searchable": 1 }, "94": { "valeur_id": 94, "valeur_libelle": "Sport de montagne", "valeur_libelle_public": "Sport de montagne", "valeur_filtre": 23, "valeur_ordre": 4, "valeur_searchable": 1 }, "95": { "valeur_id": 95, "valeur_libelle": "\u00c9quitation", "valeur_libelle_public": "\u00c9quitation", "valeur_filtre": 23, "valeur_ordre": 5, "valeur_searchable": 1 }, "96": { "valeur_id": 96, "valeur_libelle": "Chasse et p\u00eache", "valeur_libelle_public": "Chasse et p\u00eache", "valeur_filtre": 23, "valeur_ordre": 6, "valeur_searchable": 1 }, "97": { "valeur_id": 97, "valeur_libelle": "Sport de ballons", "valeur_libelle_public": "Sport de ballons", "valeur_filtre": 23, "valeur_ordre": 7, "valeur_searchable": 1 }, "98": { "valeur_id": 98, "valeur_libelle": "Sport de raquettes", "valeur_libelle_public": "Sport de raquettes", "valeur_filtre": 23, "valeur_ordre": 8, "valeur_searchable": 1 }, "138": { "valeur_id": 138, "valeur_libelle": "Sport de combat", "valeur_libelle_public": "Sport de combat", "valeur_filtre": 23, "valeur_ordre": 9, "valeur_searchable": 1 }, "133": { "valeur_id": 133, "valeur_libelle": "Autre", "valeur_libelle_public": "Autre", "valeur_filtre": 23, "valeur_ordre": 100, "valeur_searchable": 0 } } } } }, { "cat_id": 26, "cat_alias": "Vetements", "cat_libelle": "V\u00eatements", "cat_ref_sing": "v\u00eatement", "cat_ref_plur": "v\u00eatements", "filtres": [] }], "distances": [0, 5, 10, 20, 50, 100], "is_robot": false, "jwt_auth": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJkb25ub25zIiwiaWF0IjoxNzA5MjQxNTcyLCJleHAiOjE3MDkyNDUxNzJ9.4ADX2Sx0iqk4GJ70ZNOmRwj9GfJjv6cNAlonztQB3Ns", "Reference": null, "isSudo": false, "events": [], "API_Options": "{\"debug\":false,\"verbose\":false,\"env\":\"prod\",\"mobile\":false}", "API_Modules": "{}", "nb_dons_public_regions": "[{\"hc-key\":\"fr-a\",\"value\":629,\"alias\":\"Alsace\"},{\"hc-key\":\"fr-b\",\"value\":1044,\"alias\":\"Aquitaine\"},{\"hc-key\":\"fr-bl\",\"value\":0,\"alias\":\"Saint-Barthelemy\"},{\"hc-key\":\"fr-c\",\"value\":189,\"alias\":\"Auvergne\"},{\"hc-key\":\"fr-d\",\"value\":167,\"alias\":\"Bourgogne\"},{\"hc-key\":\"fr-e\",\"value\":1311,\"alias\":\"Bretagne\"},{\"hc-key\":\"fr-f\",\"value\":521,\"alias\":\"Centre\"},{\"hc-key\":\"fr-g\",\"value\":126,\"alias\":\"Champagne-Ardenne\"},{\"hc-key\":\"fr-gf\",\"value\":0,\"alias\":\"Guyane\"},{\"hc-key\":\"fr-gp\",\"value\":0,\"alias\":\"Guadeloupe\"},{\"hc-key\":\"fr-h\",\"value\":2,\"alias\":\"Corse\"},{\"hc-key\":\"fr-i\",\"value\":167,\"alias\":\"Franche-Comte\"},{\"hc-key\":\"fr-j\",\"value\":5392,\"alias\":\"Ile-de-France\"},{\"hc-key\":\"fr-k\",\"value\":559,\"alias\":\"Languedoc-Roussillon\"},{\"hc-key\":\"fr-l\",\"value\":33,\"alias\":\"Limousin\"},{\"hc-key\":\"fr-m\",\"value\":629,\"alias\":\"Lorraine\"},{\"hc-key\":\"fr-mf\",\"value\":0,\"alias\":\"Saint-Martin\"},{\"hc-key\":\"fr-mq\",\"value\":0,\"alias\":\"Martinique\"},{\"hc-key\":\"fr-n\",\"value\":931,\"alias\":\"Midi-Pyrenees\"},{\"hc-key\":\"fr-nc\",\"value\":0,\"alias\":\"Nouvelle-Caledonie\"},{\"hc-key\":\"fr-o\",\"value\":587,\"alias\":\"Nord-Pas-de-Calais\"},{\"hc-key\":\"fr-p\",\"value\":86,\"alias\":\"Basse-Normandie\"},{\"hc-key\":\"fr-pf\",\"value\":0,\"alias\":\"Polynesie-Francaise\"},{\"hc-key\":\"fr-pm\",\"value\":0,\"alias\":\"Saint-Pierre-et-Miquelon\"},{\"hc-key\":\"fr-q\",\"value\":272,\"alias\":\"Haute-Normandie\"},{\"hc-key\":\"fr-r\",\"value\":1117,\"alias\":\"Pays-de-la-Loire\"},{\"hc-key\":\"fr-re\",\"value\":0,\"alias\":\"Reunion\"},{\"hc-key\":\"fr-s\",\"value\":239,\"alias\":\"Picardie\"},{\"hc-key\":\"fr-t\",\"value\":411,\"alias\":\"Poitou-Charentes\"},{\"hc-key\":\"fr-u\",\"value\":1316,\"alias\":\"Provence-Alpes-Cote-d-Azur\"},{\"hc-key\":\"fr-v\",\"value\":2276,\"alias\":\"Rhone-Alpes\"},{\"hc-key\":\"fr-wf\",\"value\":0,\"alias\":\"Wallis-et-Futuna\"},{\"hc-key\":\"fr-yt\",\"value\":0,\"alias\":\"Mayotte\"}]" };</script>
        <script src="buttonmenuetsearch.js"></script>
        <script src="amine.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="preload" as="font" href="/fonts/fontawesome-webfont.woff2?v=4.7.0" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="/fonts/icomoon4.woff2" type="font/woff2" crossorigin>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
    <title>Tabaraa</title>
</head>

<body id="page-profil">
    <header class="tabaraa-header">
        @include('components.userAuth.header')
    </header>
    <div class="ham-nav ham-right" id="nav-user" data-icon="user" data-title="profil">
        <div class="title"><i class="fa fa-user"></i>
            <span class="f-grow-1 flex-text">profil</span>
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
            <a href="{{ route('userAuth_vetement') }}" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            <a href="{{ route('userAuth_livre') }}" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            <a href="{{ route('userAuth_medecine') }}" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            <a href="{{ route('userAuth_articleMaison') }}" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            <a href="{{ route('userAuth_auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="{{ route('userAuth_autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>
        </div>
    </div>
    <div class="deco-bg">
        <div class="container main-bg">
            <h1><i class="fa fa-user"></i>Mon compte</h1>
            <div class="f-container f-item no-gutter f-content-between login-container">
                <div class="f-item f-lg-50 panel mr-xs pa-xs ">
                    <h2 class="replaceH pa-md text-center">Paramètres</h2>
                    <div class="f-container pb-xl ma-xs ">
                        <div class="f-item f-md-50 pa-md panel">
                            <div class="f-container no-gutter" data-alias="profil">
                                <div class="f-container f-item f-content-center relative">
                                    <div class="f-container f-content-center f-item text-center pt-md">
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('mesAnnonces') }}" class="btn f-item" title="Mes annonces"><i class="fa fa-archive"></i><span class="label">Mes annonces</span></a>
                            <a href="{{ route('afficher_modifier_nom_complet') }}" class="btn f-item" title="Modifier_Nom_Complet"><i class="fa fa-user"></i><span class="label">Modifier Le Nom</span></a>
                            <a href="{{ route('afficher_modifier_numero_telephone') }}" class="btn f-item" title="Modifier_Numero_Telephone"><i class="fa fa-phone"></i><span class="label">Modifier Numéro Telephone</span></a>
                            <a href="{{ route('afficher_modifier_mot_de_passe') }}" class="btn f-item" title="Modifier_mot_de_passe"><i class="fa fa-lock"></i><span class="label">Modifier mot de passe</span></a>
                            <a href="{{ route('afficher_supprimer_Compte') }}" class="btn f-item suppression-compte" title="Supprimer_mon_compte"><i class="fa fa-user-times"></i><span class="label">Supprimer mon compte</span></a>
                            <br><br>
                            <div class="f-container f-item  f-wrap-nowrap  mt-md">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp;

                                <a href="{{ route('deconnexion') }}" class="btn blue" title="Me déconnecter"><span class="label">Se déconnecter</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="f-container f-lg-50 ml-xs f-item panel text-center f-align-center">
                    <div class="f-item" id="ajout image">
                        <img src="{{ asset('assets\images\hhh.png') }}" height="250px" width="450px" alt="imageconnectiondroite">
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
                <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Contact : Tabaraa.dz@gmail.com</a></li>

            </ul>
            <p>&copy;2024 Tabaraa | Tous droits réservés</p>
        </footer>
    </div>
    <<script>
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
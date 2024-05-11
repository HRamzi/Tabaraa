<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="preload" as="font" href="/fonts/fontawesome-webfont.woff2?v=4.7.0" type="font/woff2" crossorigin />
        <link rel="preload" as="font" href="/fonts/icomoon4.woff2" type="font/woff2" crossorigin />
        <script src="{{ asset('assets\js\App.js') }}"></script>
        <link href="{{ asset('assets\css\styles.css') }}" rel="stylesheet" />
        <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}" />
        <title>Tabaraa</title>
    </head>
    <body id="page-login">
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
                                <a class="f-container logo-full" href="{{ route('home') }}" title="Site de don d'objets">
                                    <img class="logo f-align-self-center" height="50" width="100" src="{{ asset('assets\images\Tabaraalogo.svg') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                                </a>
                            </div>
                        </div>
    
                        <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-end">
                                <a id="header-login-btn" class="repliable tool" href="{{ route('afficherFormulaireConnexion') }}">
                                    <i class="fa fa-user fa"></i>
                                        <span>Page de connexion</span>
                                </a>     
                        </div>
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
                <a href="{{ route('auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i>  &nbsp; &nbsp; Pièces Automobiles</a>
                <a href="{{ route('autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>
            </div>
    </div>
        <div class="deco-bg">
            <div class="container main-bg">
                <h1><i class="fa fa-user"></i>Connexion</h1>
                <div class="f-container f-item no-gutter f-content-between login-container">
                    <div class="f-item f-lg-50 panel mr-xs pa-xs text-center">
                        <h2 class="replaceH pa-md text">Entrez vos informations</h2>
                        <form class="custom-form" method="post" action="{{ route('connexion') }}" >
                            @csrf
                            <div class="pa-sm pt-none">
                                <div id="content-form">
                                    <div class="block-input">
                                        <div class="">
                                            <label for="email" class="f-container area f-align-center" >
                                                <div class="f-item f-md-30 text-left"> Email</div>
                                                <div class="f-item f-md-70">
                                                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="block-input">
                                            <label for="password" class="f-container area f-align-center " >
                                                <div class="f-item f-md-30 text-left" >Mot de passe</div>
                                                <div class="f-item f-md-70">
                                                    <div class="f-container f-wrap-nowrap f-align-center">
                                                        <input type="password" class="form-control" id="password" name="mot_de_passe" placeholder="Mot de passe" autocomplete="off" value="{{ old('mot_de_passe') }}" required>
                                                        <span class="text-danger">@error('mot_de_passe') {{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                            </label>
       <div class="f-item pb-sm text">
    <a href="{{ route('oublie_mot_de_passe') }}">Mot de passe oublié ?</a>
</div>



</div>
                                    </div>
                                    <div class="f-container text-center no-gutter block-input submit">
                                        <div class="f-item"><button type="submit" class=" btn blue">Se connecter</button></div>
                                    </div>
                                    <div class="f-container text-center no-gutter block-input submit">
                                        <div class="f-item">Vous n'avez pas de compte ? <a href="{{ route('afficherFormulaireInscription') }}">S'inscrire ici !</a></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="f-container f-lg-50 ml-xs f-item panel text-center f-align-center">
                        <div class="f-item">
                            <img src="{{ asset('assets\images\donationlogo8-removebg-preview.png') }}" height="250px" width="450px" alt="imageconnectiondroite">
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
                        <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\donationlogo8-removebg-preview.png') }}" loading="lazy" decoding="async" alt="" /><br>
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
                    <li class="menu__item"><a class="menu__link" href="#">Contact : Tabaraa.dz@gmail.com</a></li>
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
    </body>
</html>
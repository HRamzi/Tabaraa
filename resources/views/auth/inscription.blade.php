<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="preload" as="font" href="/fonts/fontawesome-webfont.woff2?v=4.7.0" type="font/woff2" crossorigin />
    <link rel="preload" as="font" href="/fonts/icomoon4.woff2" type="font/woff2" crossorigin />
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link href="{{ asset('assets\css\styles.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets\images\logoT.png') }}" />
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
                            <a class="f-container logo-picto" href="#" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="20" width="20" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                            <a class="f-container logo-full" href="index6.html" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="50" width="100" src="{{ asset('assets\images\Tabaraalogo.svg') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                        </div>
                    </div>
                    <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-end">

                        <a id="header-login-btn" class="repliable tool" href="{{ route('afficherFormulaireConnexion') }}">
                            <i class="fa fa-user fa"></i>
                            <span>Page d'inscription</span>
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
            <a href="{{ route('auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="{{ route('autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>
        </div>
    </div>
    <div class="deco-bg">
        <div class="container main-bg">
            <h1><i class="fa fa-user"></i>Créer un compte </h1>
            <div class="global-shadow"></div>
            <div class="f-container no-gutter f-content-around pa-xs">
                <div class="f-item text-center">
                    <h1 class="text-left"></h1>

                    <form accept-charset="utf-8" action="{{ route('inscription') }}" method="post" class="custom-form panel pa-xs" enctype="multipart/form-data">
                        @csrf
                        <div class="f-item pt-none">
                            <div id="f-item content-form">
                                <div class="">
                                    <div class="block-input mt-md">
                                        <label for="sign_pseudo" class="f-container area">
                                            <div class="f-item f-md-40 text-center pa-xs text">
                                                Nom Complet
                                            </div>
                                            <div class="f-item f-md-40">
                                                <input type="text" autocomplete="useless" class="form-control" maxlength="20" id="sign_pseudo" name="Nom_Complet" value="{{ old('Nom_Complet') }}" required>
                                                <span class="text-danger">@error('Nom_Complet') {{ $message }} @enderror</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="block-input mt-xl">
                                        <label for="sign_email" class="f-container area pa-xs">
                                            <div class="f-item f-md-40 labelInput text">
                                                Adresse email
                                            </div>
                                            <div class="f-item f-md-40">
                                                <input type="email" autocomplete="useless" class="form-control" id="sign_email" name="email" value="{{ old('email') }}" required>
                                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="block-input mt-md">
                                        <label for="sign_pseudo" class="f-container area">
                                            <div class="f-item f-md-40 text-center pa-xs text">
                                                Numero de Telephone
                                            </div>
                                            <div class="f-item f-md-40">
                                                <input type="text" autocomplete="useless" class="form-control" maxlength="10" id="num" name="numero_telephone" value="{{ old('numero_telephone') }}" pattern="0(5|6|7)[0-9]{8}" required>
                                                <span class="text-danger">@error('numero_telephone') {{ $message }} @enderror</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="block-input mt-md">
                                        <label for="sign_password" class="f-container area">
                                            <div class="f-item f-md-40 text-center pa-xs text">
                                                Mot de passe
                                            </div>
                                            <div class="f-item f-md-40 text-left">
                                                <div class="f-container f-wrap-nowrap f-align-center">
                                                    <input type="password" autocomplete="off" class="form-control" id="sign_password" name="mot_de_passe" value="" required>
                                                    <span class="text-danger">@error('mot_de_passe') {{ $message }} @enderror</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="block-input mt-md">
                                        <label for="sign_passconf" class="f-container area">
                                            <div class="f-item f-md-40 text-center pa-xs text">
                                                Confirmation du mot de passe
                                            </div>
                                            <div class="f-item f-md-40">
                                                <div class="f-container f-wrap-nowrap f-align-center">
                                                    <input type="password" autocomplete="off" class="form-control" id="sign_passconf" name="confirmation_mot_de_passe" value="{{ old('photo_profile') }}" required>
                                                    <span class="text-danger">@error('mot_de_passe') {{ $message }} @enderror</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="block-input mt-md">
                                        <label for="sign_pseudo" class="f-container area">
                                            <div class="f-item f-md-40 text-center pa-xs text">
                                                Photo de Profile
                                            </div>
                                            <div class="pa-md">
                                                <input type="file" class="form-control full-size reset-input autoValidation" id="photo" name="photo_profile" value="{{ old('photo') }}" accept=".PNG,.JPG" multiple />
                                                <span class="text-danger">@error('photo_profile') {{ $message }} @enderror</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="mt-md">
                                    </div>
                                </div>
                                <div class="text-center pt-md">
                                    <button type="submit" class=" btn blue">S'inscrire</button>
                                </div>
                                <div class="f-container text-center no-gutter block-input submit">
                                    <div class="f-item">Vous avez déjà un compte ?<a href="{{ route('afficherFormulaireConnexion') }}"> Se connecter ! </a></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="dbalpha"></div>
        <div id="dialogBoxContent"></div>
        <div id="toast-box"></div>
        <div class="page-bottom">
            <div class="container">
                <div class="page-bottom-promote">
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="Donnons.org" /><br>
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
    <script src="script1.js"></script>
    <script src="script2.js"></script>
</body>

</html>
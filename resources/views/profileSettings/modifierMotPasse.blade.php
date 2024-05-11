<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets\js\jQuery.js') }}"></script>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
    <title>Tabaraa</title>

</head>

<body id="page-profil">

    <header class="tabaraa-header">
        @include('components.userAuth.header')
    </header>

    @include('components.userAuth.ham_nav')

    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="container main-bg">
            <h1 class="rep"><i class="fa fa-envelope-o mr-xs"></i>Modification d'utilisateur</h1>
            <div class="panel pa-xl ma-xs">
                <form action="{{ route('modifier_mot_de_passe') }}" method="post" class="custom-form f-item pa-xs">
                    @csrf
                    <div class="grey mt-xl">
                        <div>
                            <div class="block-input f-item">
                                <label for="profil-actuel-phone" class="f-container area">
                                    <div class="f-item f-md-50 text-center">
                                        Mot de passe Actuel
                                    </div>
                                    <div class="f-item f-md-50">
                                        <input type="password" maxlength="20" id="profil-actuel-phone"
                                            name="mot_de_passe_actuel" value="" required
                                            oninput="verifierNumeroTelephone(this)" />
                                        <span class="text-danger">@error('mot_de_passe') {{ $message }} @enderror</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="grey mt-xl">
                        <div>
                            <div class="block-input f-item">
                                <label for="profil-new-phone" class="f-container area">
                                    <div class="f-item f-md-50 text-center">
                                        Nouveau mot de passe
                                    </div>
                                    <div class="f-item f-md-50">
                                        <input type="password" maxlength="20" id="profil-new-phone"
                                            name="nouveau_mot_de_passe" value="" required />
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="f-container f-content-center">
                        <a href="{{ route('profile') }}" class="btn lg red f-item f-md-33 text-center ma-xs"><i
                                class="fa fa-chevron-left"></i>&nbsp;Annuler</a>
                        <button type="submit" class="btn lg f-item blue f-md-33 text-center ma-xs"
                            onclick="showSuccessMessage()"><i class="fa fa-check"></i>&nbsp;Valider</button>
                    </div>
                </form>
            </div>
        </div>
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
                    title: "Votre demande a été effectuée avec succès",
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
                <img class="logo f-align-self-center" width="200" height="85"
                    src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async"
                    alt="" /><br>
                <span class="pt-none mt-none ml-none"><span class="text-orange">Nous donnons des dons à toutes </span>
                    &nbsp;
                    <span class="text-blue-light">personnes étant dans le besoin</span></span>
            </div>
            <div class="page-bottom-illustrate">
                <small><b>Tabaraa..</b><br>&nbsp;&nbsp;&nbsp;&nbsp;Ne vous encombrez pas de choses qui ne servent plus,
                    donnez ! Meubles, vêtements... Offrez une deuxième vie à vos objets inutilisés; même abîmés, ils
                    peuvent encore servir. Donnons les objets qui nous encombrent depuis tant de temps pour faire le
                    bonheur de quelqu'un.</small>
            </div>
        </div>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </div>

    <footer class="footer">


        <ul class="menu">
            <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Accueil</a></li>
            <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Contact </a></li>

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
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets\js\jQuery.js') }}"></script>
    <script src="{{ asset('assets\js\sweetAlert.js') }}"></script>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
    <title>Tabaraa</title>
    <style>
        /* Ajout de styles pour l'icône d'œil et le bouton de bascule */
        .password-input-group {
            position: relative;
        }

        .password-toggle-btn {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
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
                <form id="changePasswordForm" action="{{ route('modifier_mot_de_passe') }}" method="post"
                    class="custom-form f-item pa-xs">
                    @csrf
                    <div class="block-input f-item">
                        <label for="profil-actuel-phone" class="f-container area">
                            <div class="f-item f-md-50 text-center">
                                Mot de passe Actuel
                            </div>
                            <div class="f-item f-md-50 password-input-group">
                                <input type="password" maxlength="20" id="profil-actuel-phone"
                                    name="mot_de_passe_actuel" value="" required />
                                <span class="password-toggle-btn" onclick="togglePasswordVisibility('profil-actuel-phone')">
                                    <i class="fa fa-eye"></i>
                                </span>
                                <span class="text-danger">@error('mot_de_passe_actuel') {{ $message }} @enderror</span>
                            </div>
                        </label>
                    </div>

                    <div class="block-input f-item">
                        <label for="profil-new-phone" class="f-container area">
                            <div class="f-item f-md-50 text-center">
                                Nouveau mot de passe
                            </div>
                            <div class="f-item f-md-50 password-input-group">
                                <input type="password" maxlength="20" id="profil-new-phone"
                                    name="nouveau_mot_de_passe" value="" required />
                                <span class="password-toggle-btn" onclick="togglePasswordVisibility('profil-new-phone')">
                                    <i class="fa fa-eye"></i>
                                </span>
                                <span class="text-danger">@error('nouveau_mot_de_passe') {{ $message }} @enderror</span>
                            </div>
                        </label>
                    </div>

                    <div class="block-input f-item">
                        <label for="profil-confirm-phone" class="f-container area">
                            <div class="f-item f-md-50 text-center">
                                Confirmer le nouveau mot de passe
                            </div>
                            <div class="f-item f-md-50 password-input-group">
                                <input type="password" maxlength="20" id="profil-confirm-phone"
                                    name="nouveau_mot_de_passe_confirmation" value="" required />
                            </div>
                        </label>
                    </div>

                    <div class="f-container f-content-center">
                        <a href="{{ route('profile') }}"
                            class="btn lg red f-item f-md-33 text-center ma-xs"><i
                                class="fa fa-chevron-left"></i>&nbsp;Annuler</a>
                        <button type="button" id="submitBtn" class="btn lg f-item blue f-md-33 text-center ma-xs"><i
                                class="fa fa-check"></i>&nbsp;Valider</button>
                    </div>
                </form>
            </div>
        </div>

    <div class="page-bottom">
        <div class="container">
            <div class="page-bottom-promote">
                <img class="logo f-align-self-center" width="200" height="85"
                    src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async"
                    alt="" /><br>
                <span class="pt-none mt-none ml-none"><span
                        class="text-orange">Nous donnons des dons à toutes </span>
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
        // Intercepter la soumission du formulaire
        document.getElementById('submitBtn').addEventListener('click', function () {
            // Envoyer la requête AJAX
            var form = document.getElementById('changePasswordForm');
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Afficher un message de succès
                            Swal.fire({
                                title: response.message,
                                icon: 'success',
                                timer: 5000
                            }).then(() => {
                                // Rediriger vers la page de profil
                                window.location.href = "{{ route('profile') }}";
                            });
                        } else {
                            // Afficher un message d'erreur
                            Swal.fire({
                                title: response.message,
                                icon: 'error'
                            });
                        }
                    } else {
                        // Afficher un message d'erreur générique
                        Swal.fire({
                            title: 'Erreur',
                            text: 'Une erreur s\'est produite. Veuillez réessayer.',
                            icon: 'error'
                        });
                    }
                }
            };
            xhr.send(formData);
        });

        // Fonction pour basculer l'affichage du mot de passe
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var passwordToggleIcon = passwordInput.nextElementSibling.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggleIcon.classList.remove('fa-eye');
                passwordToggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordToggleIcon.classList.remove('fa-eye-slash');
                passwordToggleIcon.classList.add('fa-eye');
            }
        }
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets\js\jQuery.js') }}"></script>
    <script src="{{ asset('assets\js\sweetAlert.js') }}"></script>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.png') }}">
    <title>Mot de passe oublié - Tabaraa</title>
    <style>
        /* Ajout de styles pour l'icône d'œil */
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

<body>

    <header class="tabaraa-header">
        @include('components.userNotAuth.header')
    </header>

    @include('components.userAuth.ham_nav')

    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="container main-bg">
            <h1 class="rep"><i class="fa fa-envelope-o mr-xs"></i>Mot de passe oublié</h1>
            <div class="panel pa-xl ma-xs">
                <form id="forgotPasswordForm" action="{{ route('reinitialiser_mot_de_passe') }}" method="post"
                    class="custom-form f-item pa-xs">
                    @csrf
                    <div class="block-input f-item">
                        <label for="email" class="f-container area">
                            <div class="f-item f-md-50 text-center">
                                Adresse e-mail
                            </div>
                            <div class="f-item f-md-50">
                                <input type="email" id="email" name="email" value="" required />
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                        </label>
                    </div>

                    <!-- Champ pour le nouveau mot de passe (initiallement caché) -->
                    <div class="block-input f-item" id="nouveauMotDePasse" style="display: none;">
                        <label for="password" class="f-container area">
                            <div class="f-item f-md-50 text-center">
                                Nouveau mot de passe
                            </div>
                            <div class="f-item f-md-50">
                                <div class="password-input-group">
                                    <input type="password" id="password" name="password" minlength="8" value=""
                                        required />
                                    <!-- Icône d'œil pour afficher/masquer le mot de passe -->
                                    <span class="password-toggle-btn" onclick="togglePasswordVisibility()">
                                        <i id="passwordToggleIcon" class="fa fa-eye"></i>
                                    </span>
                                </div>
                                <span class="text-danger" id="passwordError"></span>
                            </div>
                        </label>
                    </div>

                    <div class="f-container f-content-center">
                        <button type="button" id="suivantBtn" class="btn lg blue f-item f-md-33 text-center ma-xs"
                            onclick="suivant()">
                            Suivant <i class="fa fa-chevron-right"></i>
                        </button>
                        <a href="{{ url()->previous() }}"
                            class="btn lg red f-item f-md-33 text-center ma-xs"><i
                                class="fa fa-chevron-left"></i>&nbsp;Retour</a>
                        <!-- Afficher le bouton de soumission uniquement si l'email est valide -->
                        <button type="button" id="envoyerBtn" class="btn lg f-item blue f-md-33 text-center ma-xs"
                            style="display:none;" onclick="envoyerFormulaire()">
                            Envoyer <i class="fa fa-check"></i>
                        </button>
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
            <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Accueil</a></li>
            <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Contact </a></li>
        </ul>
        <p>&copy;2024 Tabaraa | Tous droits réservés</p>
    </footer>
</div>

    <script>
        function suivant() {
            var email = document.getElementById('email').value;
            if (email !== '') {
                // Cacher le bouton Suivant et afficher le champ de mot de passe
                document.getElementById('suivantBtn').style.display = 'none';
                document.getElementById('nouveauMotDePasse').style.display = 'block';
                // Afficher le bouton Envoyer
                document.getElementById('envoyerBtn').style.display = 'block';
            } else {
                Swal.fire({
                    title: 'Erreur',
                    text: 'Veuillez saisir votre adresse e-mail.',
                    icon: 'error'
                });
            }
        }

        function envoyerFormulaire() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            if (password.length < 8) {
                document.getElementById('passwordError').innerText = 'Le mot de passe doit contenir au moins 8 caractères.';
                return;
            } else {
                document.getElementById('passwordError').innerText = '';
            }
            var form = document.getElementById('forgotPasswordForm');
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
                            Swal.fire({
                                title: response.message,
                                icon: 'success',
                                timer: 5000
                            }).then(() => {
                                window.location.href = "{{ route('afficherFormulaireConnexion') }}";
                            });
                        } else {
                            Swal.fire({
                                title: response.message,
                                icon: 'error'
                            });
                        }
                    } else {
                        Swal.fire({
                            title: 'Erreur',
                            text: 'Une erreur s\'est produite. Veuillez réessayer.',
                            icon: 'error'
                        });
                    }
                }
            };
            formData.append('email', email);
            xhr.send(formData);
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var passwordToggleIcon = document.getElementById('passwordToggleIcon');
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

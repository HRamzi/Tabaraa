<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets\js\jQuery.js') }}"></script>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.png') }}">
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
                                        <input type="password" maxlength="20" id="profil-actuel-phone" name="mot_de_passe_actuel" value="" required oninput="verifierNumeroTelephone(this)" />
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
                                        <input type="password" maxlength="20" id="profil-new-phone" name="nouveau_mot_de_passe" value="" required disabled />
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="f-container f-content-center">
                        <a href="" class="btn lg red f-item f-md-33 text-center ma-xs"><i class="fa fa-chevron-left"></i>&nbsp;Annuler</a>
                        <button type="submit" class="btn lg f-item blue f-md-33 text-center ma-xs"><i class="fa fa-check"></i>&nbsp;Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function verifierNumeroTelephone(input) {
            var champNouveauNumero = document.getElementById("profil-new-phone");
            var numeroTelephoneActuel = input.value;
    
            // Vérifier la validité du numéro de téléphone actuel
            if (input.validity.valid) {
                // Effectuer une requête AJAX pour vérifier si le numéro existe dans la base de données Laravel
                $.ajax({
                    url: '{{ route("checkPhoneNumber") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        numero_telephone_actuel: numeroTelephoneActuel
                    },
                    success: function(response) {
                        // Si le numéro existe, activer le champ du "Nouveau numéro de téléphone"
                        if (response.exists) {
                            champNouveauNumero.disabled = false;
                        } else {
                            champNouveauNumero.disabled = true;
                        }
                    }
                });
            } else {
                // Si la saisie n'est pas valide, désactiver le champ du "Nouveau numéro de téléphone"
                champNouveauNumero.disabled = true;
            }
        }
    </script>
    
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
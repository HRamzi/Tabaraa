<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
    <title>Tabaraa</title>

    <style>
        /* Vos styles CSS personnalisés ici */
        /* Style pour la liste des notifications */
        .notification-list {
            list-style: none;
            padding: 0;
        }

        .notification-item {
            background-color: #f9f9f9;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Entête -->
    <header class="tabaraa-header">
        @include('components.userAuth.header')
    </header>

    <!-- Contenu principal -->
    <main>
        <div class="container">
            <h1>Liste des Notifications</h1>
            <!-- Affichage des notifications -->
            @if(count($notifications) > 0)
                <ul class="notification-list">
                    @foreach($notifications as $notification)
                        <li class="notification-item">
                            {{-- Affichage du nom complet de l'utilisateur et du titre de l'annonce --}}
                            {{ $notification->user->Nom_Complet }} veut récupérer votre annonce nommée "{{ $notification->annonce->titre }}"
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucune notification pour le moment.</p>
            @endif
        </div>
    </main>

    <div id="dbalpha"></div>
    <div id="dialogBoxContent"></div>
    <div id="toast-box"></div>
    <div class="page-bottom">
        <div class="container">
            <div class="page-bottom-promote">
                <img class="logo f-align-self-center" width="200" height="85"
                    src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="" /><br>
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

    <script src="{{ asset('assets\js\script1.js') }}"></script>
    <script src="{{ asset('assets\js\script2.js') }}"></script>
    <script src="{{ asset('assets\js\script3.js') }}"></script>
    <script src="{{ asset('assets\js\user.js') }}"></script>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>var $globals = {};</script>
    <script src="{{ asset('assets\js\script1.js') }}"></script>
    <script src="{{ asset('assets\js\script2.js') }}"></script>
    <script src="{{ asset('assets\js\script3.js') }}"></script>
    <script src="{{ asset('assets\js\user.js') }}"></script>

    <script>
        // Fonction pour obtenir les notifications
        function getNotifications() {
            $.ajax({
                url: "{{ route('getNotifications') }}",
                method: "GET",
                success: function (notifications) {
                    var modalContent = '<div>';
                    notifications.forEach(function (notification) {
                        modalContent += '<p>' + notification.annonce_title + '</p>';
                    });
                    modalContent += '</div>';

                    swal({
                        title: "Notifications",
                        html: modalContent,
                        icon: "info",
                        buttons: {
                            cancel: "Fermer"
                        },
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Gérer le clic sur le bouton de notification
        $('#notification-button').click(function () {
            getNotifications();
        });
    </script>
</body>

</html>

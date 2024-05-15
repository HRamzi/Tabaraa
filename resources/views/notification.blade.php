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
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .notification-list {
            list-style: none;
            padding: 0;
        }

        .notification-item {
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .notification-item p {
            margin: 0;
            font-size: 16px;
        }

        .notification-item p strong {
            font-weight: bold;
        }

        /* Couleurs pour les titres d'annonces */
        .annonce1 {
            background-color: #ffc107; /* Jaune */
        }

        .annonce2 {
            background-color: #007bff; /* Bleu */
        }

        .annonce3 {
            background-color: #28a745; /* Vert */
        }

        .annonce4 {
            background-color: #dc3545; /* Rouge */
        }

        .annonce5 {
            background-color: #6610f2; /* Violet */
        }

        .annonce6 {
            background-color: #17a2b8; /* Turquoise */
        }

        .annonce7 {
            background-color: #fd7e14; /* Orange */
        }

        .annonce8 {
            background-color: #6c757d; /* Gris */
        }

        .page-bottom {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .page-bottom-illustrate {
            margin-top: 20px;
        }

        .page-bottom-illustrate small {
            font-size: 14px;
            color: #ccc;
        }

        footer {
            background-color: #1e1e1e;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        .menu {
            padding: 0;
            list-style-type: none;
        }

        .menu__item {
            display: inline-block;
            margin-right: 20px;
        }

        .menu__link {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .menu__link:hover {
            color: #ffc107;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        .footer .waves {
            position: relative;
            width: 100%;
            overflow: hidden;
            margin-top: -1px;
            pointer-events: none;
        }

        .footer .wave {
            position: absolute;
            width: 100%;
            height: 8px;
            background-image: radial-gradient(circle, #ffc107 0%, transparent 50%);
            background-size: 10px 10px;
            transform: rotate(45deg);
            animation: wave 1.5s linear infinite;
        }

        @keyframes wave {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
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
                @foreach($notifications as $index => $notification)
                <li class="notification-item annonce{{ $index % 8 + 1 }}">
                    {{-- Affichage du nom complet de l'utilisateur et du titre de l'annonce --}}
                    <p><strong>{{ $notification->user->Nom_Complet }}</strong> veut récupérer votre annonce nommée
                        "{{ $notification->annonce->titre }}"</p>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>var $globals = {};</script>
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

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css"
        integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Vos styles CSS personnalisés ici */

        /* Style du badge de notification */
        .badge {
            font-size: 0.8rem;
            padding: 0.2em 0.5em;
            min-width: 1em;
            text-align: center;
            vertical-align: middle;
        }

        /* Style de la fenêtre modale */
        .swal-title {
            font-size: 1.5em !important;
            font-weight: bold !important;
        }

        .swal-text {
            font-size: 1.2em !important;
        }

        .swal-button {
            background-color: #007bff !important;
        }

        .swal-button:not([disabled]):hover {
            background-color: #0056b3 !important;
        }

        /* Style pour la photo de profil */
        #profile-photo {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Style pour masquer le badge s'il n'y a pas de notifications */
        .badge.bg-danger:not(.show) {
            display: none;
        }
    </style>
</head>

<body>

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
                        <a class="f-container logo-picto" href="{{ route('userHome') }}" title="Site de don d'objets">
                            <img class="logo f-align-self-center" height="20" width="20"
                                src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy"
                                decoding="async" alt="Tabaraa" />
                        </a>
                        <a class="f-container logo-full" href="{{ route('userHome') }}" title="Site de don d'objets">
                            <img class="logo f-align-self-center" height="50" width="100"
                                src="{{ asset('assets\images\Tabaraalogo.svg') }}" loading="lazy" decoding="async"
                                alt="Tabaraa" />
                        </a>
                    </div>
                </div>
                <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-center ">
                    <div class="header-search f-content-between" id="header-search-loc">
                        <span class="header-search-resume">
                            <span class="header-search-resume-emphasis">Rechercher un don...</span>
                            <span class="header-search-resume-secondary"></span>
                        </span>
                        <button type="button" aria-label="Recherche"><i class="fa fa-search"></i></button>
                    </div>
                </div>

                <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-end">
                    <button title="Ma messagerie"
                        class="repliable ham-toggle btn-light position-relative" onclick="markAllMessagesAsRead()">
                        <a href="{{ route('messages') }}" class="text-decoration-none">
                            <span class="shell msgs-shell position-relative d-inline-block">
                                <i class="fa fa-envelope fa-lg position-relative d-block mx-auto"></i>
                                <span id="message-counter"
                                    class="badge badge-pill badge-primary position-absolute top-0 start-100 translate-middle p-1"></span>
                            </span>
                        </a>
                    </button>

                    <button title="Notifications"
                        class="repliable ham-toggle btn-light position-relative" id="notification-button">
                        <span class="shell">
                            <i class="fa fa-bell fa-lg position-relative d-block mx-auto"></i>
                            <span id="notification-counter"
                                class="badge badge-pill badge-primary position-absolute top-0 start-100 translate-middle p-1"></span>
                        </span>
                    </button>

                    <button title="Accès à mon compte" class="repliable ham-toggle" data-target="nav-user">
                        <span class="shell">
                            <img id="profile-photo" src="{{ asset('assets\images\avatar.png') }}"
                                loading="lazy" decoding="async" alt="Mon avatar">
                        </span>
                    </button>
                </div>
            </div>
            <div class="f-container f-content-center spaced" id="global-search">
                <div class="f-item">
                    <div id="search-header-appbar">
                        <button id="close-search-header"><i class="fa fa-chevron-left"></i></button>
                        <span>Ma recherche</span>
                    </div>
                    <form action="{{ route('rechercher') }}" method="POST">
                        @csrf
                        <div class="f-container pt-sm search-filter-zone text-sm">
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Que
                                    recherchez-vous ?</label>
                                <input class="select2" name="termes" id="search-header-keywords" type="text"
                                    maxlength="20" placeholder="Table,Pull..." value="" />
                            </div>
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Sur quelle
                                    ville ?</label>
                                <input class="select2" name="ville" id="search-header-keywords" type="text"
                                    maxlength="50" placeholder="Tlemcen,Oran.." value="" />
                            </div>
                            <div class="search-cell">
                                <button type="submit" id="search-header-submit"
                                    class="search-valid search" data-target="#search-header-alert">
                                    <i class="fa fa-search"></i>
                                    Rechercher
                                    <div id="search-header-alert"
                                        class="text-xs text-center display-soft-none">
                                        Veuillez sélectionner au moins un critère ci-dessus
                                    </div>
                                </button>
                                <div class="pt-sm text-center bloc_saved_search has-recherches display-none">
                                    <button class="btn outline  open-saved-search">Mes
                                        recherches</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <button id="global-search-close" class="icon-btn "><i
                        class="fa fa-arrow-up"></i></button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Fonction pour marquer tous les messages comme lus
        function markAllMessagesAsRead() {
            $.ajax({
                url: "{{ route('markAllMessagesAsRead') }}",
                method: "POST",
                success: function (data) {
                    console.log(data); // Ajoutez cette ligne pour afficher le résultat dans la console
                    if (data.success) {
                        // Mettre à jour le compteur de messages
                        $('#message-counter').text('').removeClass('show'); // Retire le compteur de messages
                    } else {
                        console.error('Erreur lors de la mise à jour des messages.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Fonction pour mettre à jour le compteur de messages
        function updateMessageCounter() {
    $.ajax({
        url: "{{ route('getMessageCount') }}",
        method: "GET",
        success: function (data) {
            if (data.count > 0) {
                if (data.count > 9) {
                    $('#message-counter').text('+9'); // Affiche "+9" si le compteur dépasse 9
                } else {
                    $('#message-counter').text(data.count); // Affiche le nombre normal sinon
                }
            } else {
                $('#message-counter').text(''); // Cache le compteur de messages s'il est égal à 0
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

        // Fonction pour mettre à jour le compteur de notifications
        function updateNotificationCounter() {
            $.ajax({
                url: "{{ route('getNotificationCount') }}",
                method: "GET",
                success: function (data) {
                    if (data.count > 0) {
                        $('#notification-counter').text(data.count); // Met à jour le compteur de notifications
                    } else {
                        $('#notification-counter').text(''); // Cache le compteur de notifications s'il est égal à 0
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

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

        // Appeler les fonctions pour mettre à jour les compteurs au chargement de la page
        $(document).ready(function () {
            updateMessageCounter();
            updateNotificationCounter();
        });

        // Gérer le clic sur le bouton de notification
        $('#notification-button').click(function () {
            window.location.href = "{{ route('notifications') }}";
        });
    </script>

</body>

</html>

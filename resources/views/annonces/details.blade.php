<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets\js\sweetAlert.js') }}"></script>
    <script src="{{ asset('assets\js\jQuery.js') }}"></script>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
    <title>Tabaraa</title>
</head>

<body id="page-detta">

    
   @if(auth()->check())
        <header class="tabaraa-header">
            @include('components.userAuth.header')
        </header>
        @include('components.userAuth.ham_nav')
    @else
        <header class="tabaraa-header">
            @include('components.userNotAuth.header')
        </header>
        <div class="ham-nav ham-right" id="nav-global" data-icon="bell" data-title="Tabaraa">
            @include('components.userNotAuth.ham-nav_ham-right')
        </div>
    @endif


    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="container main-bg">
            <div id="detail" class="f-container f-direction-column f-md-direction-row f-wrap-nowrap f-align-stretch">
                <div id="detail-body">
                    <br><br>
                    <div class="panel">
                        <div id="content-titre">
                            <div class="f-container f-align-center f-wrap-nowrap cat-9 content-heading">
                                @if($annonce)
                                <h1 class="titret f-grow-1">{{ $annonce->titre }}</h1>
                                <br>
                                @endif
                                <br>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="f-container no-gutter">
                            <div class="f-item f-lg-50">
                                <div id="swiper-photos" class="swiper">
                                    @if($annonce)
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            @if($annonce->photo)
                                            <img src="{{ asset('storage/' . $annonce->photo) }}" class="responsive-img thumbnail-extends" width="350" height="350" alt="Photo de l'annonce" />
                                            @endif
                                            <br>
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="f-item f-container f-wrap-nowrap f-direction-column f-lg-50">
                                <div class="infos text-lg f-container f-wrap-nowrap f-align-center">
                                    @if($annonce)
                                    <div class="f-grow-1">
                                        <i class="fa fa-map-marker"></i>
                                        &nbsp;{{ $annonce->ville }}
                                    </div>
                                    @endif

                                </div>
                                <div class="infos text-lg f-container f-wrap-nowrap f-align-center">
                                    @if($annonce)
                                    <div class="f-grow-1">
                                        <i class="fa-solid fa-phone"></i>
                                        &nbsp;{{ $annonce->numero_telephone }}
                                    </div>
                                    @endif

                                </div>
                                @if($annonce)
                                <div class="infos f-grow-1">
                                    <div class="fx-mmm">
                                        <br />
                                        {{ $annonce->description }}
                                    </div>
                                </div>
                                @endif

                                @if($annonce)
                                <div class="infos">
                                    <span class="text-intense-grey text-sm">
                                        <i class="fa fa-clock-o"></i>
                                        &nbsp;{{ $annonce->created_at ? $annonce->created_at->format('d M Y') : '' }}
                                    </span>
                                </div>
                                @endif

                                @if($annonce)
                                <div class="infos">
                                    <span class="text-intense-grey text-sm">
                                        <i class="fa fa-user"></i>
                                        &nbsp;{{ $annonce->utilisateur->Nom_Complet }}
                                    </span>
                                </div>
                                @endif
                                   <div class="infos text-center mt-4">
        <button class="btn btn-success" onclick="sendRecoveryRequest()">
            <i class="fa fa-check"></i> Je le Récupère
        </button>
    </div>

                  <script>
    // Fonction pour envoyer une demande de récupération
    function sendRecoveryRequest() {
        // Vérifier si l'utilisateur est connecté
        @if(Auth::check())
            // Si l'utilisateur est connecté, envoyer une requête Ajax pour récupérer l'annonce
            var annonceId = "{{ $annonce->id }}"; // Récupérer l'ID de l'annonce
            $.ajax({
                url: "/recuperer-annonce/" + annonceId,
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        title: "Demande envoyée avec succès",
                        text: "Votre demande a été envoyée au créateur de l'annonce.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    });
                },
                error: function(xhr, status, error) {
                    // Afficher un message d'erreur
                    Swal.fire({
                        title: "Erreur",
                        text: "Une erreur s'est produite lors de l'envoi de votre demande.",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        @else
            // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
            Swal.fire({
                title: "Vous devez vous connecter",
                text: "Pour récupérer cet article, veuillez d'abord vous connecter.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Connexion'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Rediriger vers la page de connexion
                    window.location.href = "{{ route('afficherFormulaireConnexion') }}";
                }
            });
        @endif
    }
</script>

                            </div>
                        </div>
                    </div>

                    <br>
                    <br><br>
                   <div id="">
    <div class="panel pt-xs pb-xs">
        <div id="form-holder">
            <form class="new-msg" id="message-form">
                <h2 class="annonce-detail-title-rep">
                    <span><i class="fa fa-comments-o"></i>Contacter le destinataire</span>
                </h2>
                <!-- Utilisez l'ID de l'utilisateur authentifié comme valeur de id_expediteur -->
                <input type="hidden" id="id_expediteur" name="id_expediteur" value="{{ Auth::id() }}">
                <!-- Utilisez l'ID de l'utilisateur qui a créé l'annonce comme valeur de id_destinataire -->
                <input type="hidden" name="id_destinataire" value="{{ $annonce->utilisateur->id }}" />
                <textarea class="reset-input" id="msg-target" name="message" cols="100" rows="6" maxlength="1000" placeholder="Écrivez votre message ici"></textarea>
                <div class="text-center mt-md">
                    <button type="button" class="btn blue lg submit-contact" onclick="sendMessage()">
                        <i class="fa fa-envelope"></i>
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
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
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }} " /><br>
                    <span class="pt-none mt-none ml-none"><span class="text-orange">Nous donnons des dons à toutes </span>
                        &nbsp;
                        <span class="text-blue-light">personnes étant dans le besoin</span></span>
                </div>
                <div class="page-bottom-illustrate">
                    <small><b>Tabaraa..</b><br>&nbsp;&nbsp;&nbsp;&nbsp;Ne vous encombrez pas de choses qui ne servent plus, donnez ! Meubles, vêtements... Offrez une deuxième vie à vos objets inutilisés; même abîmés, ils peuvent encore servir. Donnons les objets qui nous encombrent depuis tant de temps pour faire le bonheur de quelqu'un.</small>
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
    <script src="{{ asset('assets\js\script4.js') }}" type="text/javascript"></script>
    <script>
        var $globals = {
            "API_Options": "{}",
            "API_Modules": "{}"
        };
    </script>
    <script src="{{ asset('assets\js\script1.js') }}"></script>
    <script src="{{ asset('assets\js\script2.js') }}"></script>
    <script src="{{ asset('assets\js\script3.js') }}"></script>
    <script src="{{ asset('assets\js\user.js') }}"></script><!-- Ajoutez jQuery -->
<script>
    // Fonction pour envoyer le message
    function sendMessage() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData(document.getElementById('message-form'));
        formData.append('_token', csrfToken);

        var current_url = window.location.href;
        sessionStorage.setItem('redirect_url', current_url);

        $.ajax({
            url: "{{ route('broadcast') }}",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    title: 'Message envoyé !',
                    text: 'Votre message a été envoyé avec succès.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000
                });

                setTimeout(function() {
                    // Rediriger vers la page des messages après avoir affiché le message de succès
                    window.location.href = "{{ route('messages') }}";
                }, 2000);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Erreur !',
                    text: 'Une erreur s\'est produite lors de l\'envoi du message.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 5000
                });
            }
        });
    }

    // Fonction pour afficher un avertissement si l'utilisateur n'est pas connecté
    function showWarningMessage() {
        Swal.fire({
            title: "Vous devez d'abord vous connecter",
            html: "<p>Pour récupérer cet article, veuillez d'abord vous connecter.</p>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Connexion'
        }).then((result) => {
            if (result.isConfirmed) {
                // Rediriger vers la page de connexion
                window.location.href = "{{ route('afficherFormulaireConnexion') }}";
            }
        });
    }

    // Fonction pour activer l'édition du message si l'utilisateur est connecté
    function enableMessageEditing() {
        // Récupérer l'élément textarea
        var messageTextarea = document.getElementById('msg-target');

        // Ajouter un gestionnaire d'événements pour le focus
        messageTextarea.addEventListener('focus', function() {
            // Vérifier si l'utilisateur est connecté
            @if(Auth::check())
                // Si l'utilisateur est connecté, ne rien faire
            @else
                // Si l'utilisateur n'est pas connecté, afficher l'avertissement
                showWarningMessage();
                // Retirer le focus du textarea pour empêcher l'édition du message
                this.blur();
            @endif
        });
    }

    // Appeler la fonction pour activer l'édition du message
    enableMessageEditing();
</script>




</body>

</html>

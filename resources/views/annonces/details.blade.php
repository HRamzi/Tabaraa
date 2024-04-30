<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.png') }}">
    <title>Tabaraa</title>
</head>



<body id="page-detta">

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

                            <a class="f-container logo-full" href="#" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="50" width="130" src="{{ asset('assets\images\Tabaraalogo.svg') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                        </div>
                    </div>
                    <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-center">
                        <div class="header-search f-content-end" id="header-search-loc">
                            <span class="header-search-resume">
                                <span class="header-search-resume-emphasis">Rechercher un don...</span>
                                <span class="header-search-resume-secondary"></span>
                            </span>
                            <button type="button" aria-label="Recherche"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="f-grow-1 f-container f-wrap-nowrap f-align-center f-content-end">

                        <a class="repliable btn post-holder" href="{{ route('afficherFormulaireConnexion') }}" title="Publier une annonce pour donner un objet">
                            <i class="fa fa-plus"></i>
                            <span class="label">Créer une annonce</span>
                        </a>
                        
                        <a id="header-login-btn" class="repliable tool" href="{{ route('afficherFormulaireConnexion') }}">
                            <i class="fa fa-user fa"></i>
                            <span>Mon Compte</span>
                        </a>
                        


                    </div>

                </div>
                <div class="f-container f-content-center spaced" id="global-search">
                    <div class="f-item">
                        <div id="search-header-appbar">
                            <button id="close-search-header"><i class="fa fa-chevron-left"></i></button>
                            <span>Ma recherche</span>
                        </div>
                        <div class="f-container pt-sm search-filter-zone text-sm">
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Que recherchez-vous ?</label>
                                <input class="select2" id="search-header-keywords" type="text" maxlength="20" placeholder="Table,Pull..." value="" />

                            </div>
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Sur qulle ville ?</label>
                                <input class="select2" id="search-header-keywords" type="text" maxlength="50" placeholder="Tlemcen,Oran.." value="" />
                                <!-- <span class="search-header-reset-keywords disabled"><i class="fa fa-close"></i></span> -->
                            </div>
                            <div class="search-cell">
                                <button id="search-header-submit" class="search-valid search" data-target="#search-header-alert">
                                    <i class="fa fa-search"></i>
                                    RECHERCHER
                                    <!-- <span class="search-header-nb-results"></span> -->
                                    <div id="search-header-alert" class="text-xs text-center display-soft-none">
                                        Veuillez sélectionner au moins un critère ci-dessus
                                    </div>
                                </button>
                                <div class="pt-sm text-center bloc_saved_search has-recherches display-none">
                                    <button class="btn outline  open-saved-search">Mes recherches</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="global-search-close" class="icon-btn "><i class="fa fa-arrow-up"></i></button>
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
            <a href="login10.html" title="Me connecter à mon compte"><i class="fa fa-user fa-lg"></i>&nbsp; &nbsp; Se connecter
            </a>
            <a href="signup10.html" title="Créer un compte"><i class="fa-solid fa-user-plus fa-lg"></i>&nbsp; &nbsp; S'inscrire
            </a>
            <br>
            <span>Catégories</span>
            <a href="vetements.html" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            <a href="medecines.html" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            <a href="livre.html" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            <a href="artice_maison.html" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            <a href="auto.html" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="autres.html" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>

        </div>
    </div>
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
<div class="infos text-right">
    <span class="text-intense-grey text-sm">
        <span class="text-weight-bold"><i class="fa fa-clock-o"></i>
            &nbsp;{{ $annonce->created_at ? $annonce->created_at->format('d M Y') : '' }}</span>
    </span>
</div>
@endif

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
    <input type="hidden" name="id_destinataire" value="1" />
    <input type="hidden" name="id_expediteur" value="2" /> <!-- Utilisez l'ID de l'utilisateur authentifié -->
    <textarea class="reset-input" id="msg-target" name="msg" cols="100" rows="6" maxlength="1000"
        placeholder="Écrivez votre message ici"></textarea>
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
                <li class="menu__item"><a class="menu__link" href="#">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Contact </a></li>
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
    <script src="{{ asset('assets\js\user.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!-- Ajoutez jQuery -->
<script>
    function sendMessage() {
        // Récupérer le jeton CSRF depuis la balise meta
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Récupérer les données du formulaire
        var formData = new FormData(document.getElementById('message-form'));

        // Ajouter le jeton CSRF à la requête
        formData.append('_token', csrfToken);

        // Envoyer les données via AJAX à la route broadcast
        $.ajax({
            url: "{{ route('broadcast') }}",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Afficher une notification de succès avec SweetAlert2
                Swal.fire({
                    title: 'Message envoyé !',
                    text: 'Votre message a été envoyé avec succès.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000 // Ferme automatiquement la notification après 1.5 seconde
                });

                // Rediriger vers la page des messages après 2 secondes
                setTimeout(function() {
                    window.location.href = "{{ route('messages') }}";
                }, 2000);
            },
            error: function(xhr, status, error) {
                // Afficher une notification d'erreur avec SweetAlert2
                Swal.fire({
                    title: 'Erreur !',
                    text: 'Une erreur s\'est produite lors de l\'envoi du message.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 5000 // Ferme automatiquement la notification après 1.5 seconde
                });
            }
        });
    }
</script>

</body>
</html>
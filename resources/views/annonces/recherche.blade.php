<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
    <title>Résultats de la Recherche</title>
</head>

<body id="page-liste">
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
            <div><br><br></div>
            <h2 class="text-left f-item"><b></b></h2>
            <div class="container f-container f-wrap-nowrap">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div id="search-wrapper">
                    <div id="search">
                        @if($annonces->count() > 0)
                        @foreach($annonces as $annonce)
                        <div class="don" href="/don/{{ $annonce->id }}" title="{{ $annonce->titre }}" class="lst-annonce cat-{{ $annonce->categorie }}">
                            <div class="line"></div>
                            <div class="list-item f-container f-wrap-nowrap">
                                <div class="cover">
                                    <img src="{{ asset('storage/' . $annonce->photo) }}" title="{{ $annonce->titre }}" width="200" height="200" style="margin-top: 80px;" />
                                </div>
                                <div class="f-item f-container f-wrap-nowrap pa-md">
                                    <div class="f-grow-1">
                                        <div class="f-item f-container f-wrap-nowrap pa-sm">
                                            <div>
                                                <h2 class="title">{{ $annonce->titre }}</h2>
                                                <div class="city pt-sm">
                                                    <i class="fa fa-map-marker"></i>
                                                    &nbsp;{{ $annonce->ville }}
                                                </div>
                                                <div class="f-grow-1 text-left pt-md">
                                                    <i class="fa fa-clock-o"></i>
                                                    &nbsp;{{ $annonce->created_at->format('d M Y') }}
                                                </div>
                                                <p class="city pt-sm">{{ $annonce->description }}</p>
                                            </div>
                                        </div>
                                        <div class="f-container f-content-end pa-xs">
                                            <button type="button" class="btn blue" onclick="window.location='{{ route('annonces.details', ['id' => $annonce->id]) }}'">Je suis intéressé</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else <p>Aucune annonce disponible</p>
                        @endif
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
            </div>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>

        <footer class="footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Contact : Tabaraa.dz@gmail.com</a></li>
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
</body>

</html>
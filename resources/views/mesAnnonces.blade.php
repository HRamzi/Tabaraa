<!DOCTYPE html>
<html lang="fr">

<head>


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
    <div class="ham-nav ham-right" id="nav-user" data-icon="user" data-title="profil">
        <div class="title"><i class="fa fa-user"></i>
            <span class="f-grow-1 flex-text">profile</span>
            <span class="ham-close"><i class="fa fa-close"></i></span>
        </div>
        <div class="ham-content">

            <a href="{{ route('profile') }}" title="Gérer mon compte">Mon compte</a>
            <a href="{{ route('mesAnnonces') }}" title="Voir la liste de mes annonces">Mes annonces</a>
            <a href="{{ route('annonces.create') }}" title="Publier une annonce">Créer une annonce</a>
            <a href="{{ route('deconnexion') }}" rel="nofollow">Se déconnecter</a>
        </div>
    </div>
    <div class="ham-nav ham-right" id="nav-global" data-icon="bell" data-title="Tabaraa">
        <div class="title">
            <i class="fa fa-bars"></i>
            <span class="f-grow-1 flex-text">Tabaraa</span>
            <span class="ham-close"><i class="fa fa-close"></i></span>
        </div>
        <div class="ham-content" id="notifs-content">
            <br>
            <span>Catégories</span>
            <a href="{{ route('userAuth_vetement') }}" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            <a href="{{ route('userAuth_livre') }}" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            <a href="{{ route('userAuth_medecine') }}" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            <a href="{{ route('userAuth_articleMaison') }}" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            <a href="{{ route('userAuth_auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="{{ route('userAuth_autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>

        </div>
    </div>

    <div class="global-shadow"></div>

    <div class="deco-bg">
        <div class="container main-bg">

            <h1><i class="fa fa-file-text-o"></i>Mes annonces</h1>

            @if($annonces->isEmpty())
            <h2 class="block text-center">Vous n'avez pas encore d'annonces.</h2>
            <div class="f-container pa-lg">
                <div class="f-item">
                    <div class="empty-zone">
                        <h3>Vous pouvez poster une annonce en allant sur cette page: <a href="{{ route('annonces.create') }}">Créer une annonce</a></h3>
                    </div>
                </div>
            </div>
            @else
            <div class="container main-bg">
                <div><br><br></div>
                <h2 class="text-left f-item"><b></b></h2>
                <div class="container f-container f-wrap-nowrap ">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <div id="search-wrapper">
                        <div id="search">
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
                                                    <p class="city pt-sm">{{ $annonce->description }}</p>
                                                    <div class="f-grow-1 text-left pt-md">
                                                        <i class="fa fa-clock-o"></i>
                                                        &nbsp;{{ $annonce->created_at->format('d M Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <form action="{{ route('annonces.modifier', $annonce) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn blue">Modifier</button>
                                            </form>
                                            <br>
                                    <form id="delete-form-{{ $annonce->id }}" method="POST" action="{{ route('annonces.supprimer', $annonce->id) }}">
    @csrf
    @method('DELETE')
    <button type="button" onclick="confirmDelete({{ $annonce->id }})" class="btn blue">Supprimer</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Êtes-vous sûr de vouloir supprimer cette annonce ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="f-item">
                <div class="empty-zone">
                    <h3>pouvez poster une annonce en allant sur cette page : <a href="{{ route('annonces.cree') }}">Créer une annonce</a></h3>
                </div>
            </div>
            @endif
        </div>


        <div id="dbalpha"></div>
        <div id="dialogBoxContent"></div>
        <div id="toast-box"></div>

        <div class="page-bottom">
            <div class="container">
                <div class="page-bottom-promote">
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="" /> <br>
                    <span class="pt-none mt-none ml-none"><span class="text-orange">Nous donnons des dons à toutes </span>
                        &nbsp;
                        <span class="text-blue-light">personnes étant dans le besoin</span></span>
                </div>
            </div>
        </div>

        <footer class="footer">

            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('userHome') }}">Contact</a></li>
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
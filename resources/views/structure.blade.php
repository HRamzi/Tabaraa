<!DOCTYPE html>
<html lang="fr">
 
<head>
    <script src="js.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link rel="icon" href="imgs/logoT.svg">
    <title>abaraa</title>    
</head>
 
<body id="page-liste">
   
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
                            <a class="f-container logo-picto" href="#" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="20" width="20" src="imgs/logo1icondonation.png" loading="lazy" decoding="async" alt="Tabaraa" />
                            </a>
                            <a class="f-container logo-full" href="#" title="Site de don d'objets">
                                <img class="logo f-align-self-center" height="50" width="100" src="imgs/Tabaraalogo.png" loading="lazy" decoding="async" alt="Tabaraa" />
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
                        
                        <button title="Ma messagerie" class="repliable ham-toggle" data-target="nav-mails">
                            <a href="message.html">
                                <span class="shell msgs-shell">
                                <i class="fa fa-envelope fa-lg"></i>
                            </span>
                            </a>
                        </button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button title="Accès à mon compte" class="repliable ham-toggle" data-target="nav-user">
                            <span class="shell">
                                <img src="imgs/avatar.png" loading="lazy" decoding="async" alt="Mon avatar">
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
                        <div class="f-container pt-sm search-filter-zone text-sm">
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Que recherchez-vous ?</label>
                                <input class="select2" id="search-header-keywords" type="text" maxlength="20" placeholder="Table,Pull..." value="" />

                            </div>
                            <div class="search-cell">
                                <label for="search-header-keywords" class="search-input-label">Sur qulle ville ?</label>
                                <input class="select2" id="search-header-keywords" type="text"  maxlength="50" placeholder="Tlemcen,Oran.." value="" />
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
    <div class="ham-nav ham-right" id="nav-user" data-icon="user" data-title="profil">
        <div class="title"><i class="fa fa-user"></i>
            <span class="f-grow-1 flex-text">profil</span>
            <span class="ham-close"><i class="fa fa-close"></i></span>
        </div>
        <div class="ham-content">

            <a href="/compte" title="Gérer mon compte">Mon compte</a>
            <a href="/mes-annonces" title="Voir la liste de mes annonces">Mes annonces</a>
            <a href="/donner" title="Publier une annonce">Créer une annonce</a>
            <a href="login10.html" rel="nofollow">Se déconnecter</a>
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
            <a href="{{ route('vetement') }}" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
            <a href="{{ route('livre') }}" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
            <a href="{{ route('medecine') }}" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
            <a href="{{ route('article_maison') }}" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
            <a href="{{ route('auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i>  &nbsp; &nbsp; Pièces Automobiles</a>
            <a href="{{ route('autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>

        </div>
    </div>   
    <div class="global-shadow"></div>
    <div class="deco-bg">
        <div class="container main-bg">
            <div><br><br></div>
            <h2 class="text-left f-item"><b></b></h2>
            <div class="container f-container f-wrap-nowrap ">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div id="search-wrapper">
                    <div id="search">
                            <div class="don" href="" title="" class="lst-annonce cat-">
                                <div class="line"></div>                              
                                <div class="list-item f-container f-wrap-nowrap">
                                    <div class="cover">
                                        <img src="" title=""/>
                                    </div>
                                    <div class="f-item f-container f-wrap-nowrap pa-md">
                                        <div class="f-grow-1">
                                            <div class="f-item f-container f-wrap-nowrap pa-sm">
                                                <div>
                                                    <h2 class="title">titre</h2>
                                                    <p class="city pt-sm">description</p>
                                                    <div class="city pt-sm">
                                                        <i class="fa fa-map-marker"></i>
                                                        &nbsp;ville
                                                    </div>
                                                    <div class="f-grow-1 text-left pt-md">
                                                        <i class="fa-solid fa-phone"></i>
                                                        &nbsp;telephone
                                                    </div>
                                                    <div class="f-grow-1 text-left pt-md">
                                                        <i class="fa fa-clock-o"></i>
                                                        &nbsp; date
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="f-container f-content-end pa-xs">
                                                <button type="submit" class="btn blue">Contacter le donneur</button>
                                            </div>
                                        </div>
                                    </div>
                                    
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
                    <img class="logo f-align-self-center" width="200" height="85" src="{{ asset('assets\images\logo1icondonation.png') }} "/><br>
                    <span class="pt-none mt-none ml-none"><span class="text-orange">Nous donnons des dons à toutes </span>
                    &nbsp;
                    <span class="text-blue-light">personnes étant dans le besoin</span></span>
                </div>
            </div>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
 
        <footer class="footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="">Contact : Tabaraa.dz@gmail.com</a></li>
            </ul>
            <p>&copy;2024 Tabaraa | Tous droits réservés</p>
        </footer>
    </div>



    <script src="script4.js" type="text/javascript"></script>
    <script>var $globals = {"API_Options":"{}","API_Modules":"{}"};</script>
	<script src="script1.js"></script>
	<script src="script2.js"></script>
    <script src="script3.js"></script>
    <script src="user.js"></script>
</body>
 
</html>
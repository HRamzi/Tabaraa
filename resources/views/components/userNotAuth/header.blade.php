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
                    <a class="f-container logo-picto" href="{{ route('home') }}" title="Site de don d'objets">
                        <img class="logo f-align-self-center" height="50" width="50" src="{{ asset('assets\images\logo1icondonation.png') }}" loading="lazy" decoding="async" alt="Tabaraa" />
                    </a>
                    <a class="f-container logo-full" href="{{ route('home') }}" title="Site de don d'objets">
                        <img class="logo f-align-self-center" height="50" width="100" src="{{ asset('assets\images\Tabaraalogo.svg') }}" loading="lazy" decoding="async" alt="Tabaraa" />
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
                <a class="repliable btn  post-holder" href="{{ route('annonces.create') }}" title="Publier une annonce pour donner un objet">
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
                <form action="{{ route('rechercher') }}" method="POST">
                    @csrf
                    <div class="f-container pt-sm search-filter-zone text-sm">
                        <div class="search-cell">
                            <label for="search-header-keywords" class="search-input-label">Que recherchez-vous ?</label>
                            <input class="select2" name="termes" id="search-header-keywords" type="text" maxlength="20" placeholder="Table,Pull..." value="" />
                        </div>
                        <div class="search-cell">
                            <label for="search-header-keywords" class="search-input-label">Sur quelle ville ?</label>
                            <input class="select2" name="ville" id="search-header-keywords" type="text" maxlength="50" placeholder="Tlemcen,Oran.." value="" />
                            <!-- <span class="search-header-reset-keywords disabled"><i class="fa fa-close"></i></span> -->
                        </div>
                        <div class="search-cell">
                            <button type="submit" id="search-header-submit" class="search-valid search" data-target="#search-header-alert">
                                <i class="fa fa-search"></i>
                                Rechercher
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
                </form>
            </div>
            <button id="global-search-close" class="icon-btn "><i class="fa fa-arrow-up"></i></button>
        </div>
    </div>
</div>
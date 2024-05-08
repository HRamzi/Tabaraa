<div class="ham-nav ham-right" id="nav-user" data-icon="user" data-title="profil">
    <div class="title"><i class="fa fa-user"></i>
        <span class="f-grow-1 flex-text">profile</span>
        <span class="ham-close"><i class="fa fa-close"></i></span>
    </div>
    <div class="ham-content">
        <a href="{{ route('profile') }}" title="Gérer mon compte">Mon compte</a>
        <a href="{{ route('mesAnnonces') }}" title="Voir la liste de mes annonces">Mes annonces</a>
        <a href="{{ route('annonces.cree') }}" title="Publier une annonce">Créer une annonce</a>
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
        href="{{ route('userAuth_vetement') }}" title="vetements">&nbsp; &nbsp;<i class="fa-sharp fa-solid fa-shirt fa-xl" style="color: #08680f;"></i>&nbsp; &nbsp;Vetements</a>
        href="{{ route('userAuth_livre') }}" title="medecines">&nbsp; &nbsp; <i class="fa-solid fa-house-medical fa-xl" style="color: #940537;"></i>&nbsp; &nbsp;Medecines</a>
        href="{{ route('userAuth_medecine') }}" title="Livres">&nbsp; &nbsp; <i class="fa-solid fa-book fa-xl" style="color: #572d05;"></i>&nbsp; &nbsp; &nbsp;Livres</a>
        href="{{ route('userAuth_articleMaison') }}" title="artice_maison">&nbsp; &nbsp; <i class="fa-solid fa-house-chimney fa-lg" style="color: #3c3b3f;"></i> &nbsp; &nbsp;Articles Maison</a>
        href="{{ route('userAuth_auto') }}" title="pieces_auto">&nbsp; &nbsp; <i class="fa-solid fa-car fa-xl" style="color: #354c73;"></i> &nbsp; &nbsp; Pièces Automobiles</a>
        href="{{ route('userAuth_autre') }}" title="autres">&nbsp; &nbsp; <i class="fa-brands fa-slack fa-xl" style="color: #3a2612;"></i>&nbsp; &nbsp;&nbsp; Autres</a>
    </div>
</div>
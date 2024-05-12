<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class recupererAnnonce extends Controller
{

    public function  afficherAnnoncesVetement()
    {
        $annonces = Annonce::where('categorie', 'vetements')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userNotAuth.vetement', compact('annonces'));
    }

    public function  afficherAnnoncesLivre()
    {
        $annonces = Annonce::where('categorie', 'livre')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userNotAuth.livre', compact('annonces'));
    }

    public function  afficherAnnoncesMedecine()
    {
        $annonces = Annonce::where('categorie', 'medecine')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userNotAuth.medecine', compact('annonces'));
    }

    public function afficherAnnonces_Article_Maison()
    {
        $annonces = Annonce::where('categorie', 'article_maison')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userNotAuth.article_maison', compact('annonces'));
    }

    public function afficherAnnoncesAuto()
    {
        $annonces = Annonce::where('categorie', 'auto')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userNotAuth.auto', compact('annonces'));
    }

    public function  afficherAnnoncesAutre()
    {
        $annonces = Annonce::where('categorie', 'autre')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userNotAuth.autre', compact('annonces'));
    }
    public function  afficherAnnoncesVetement_AfterAuth()
    {
        $annonces = Annonce::where('categorie', 'vetements')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userAuth.vetement', compact('annonces'));
    }

    public function  afficherAnnoncesLivre_AfterAuth()
    {
        $annonces = Annonce::where('categorie', 'livre')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userAuth.livre', compact('annonces'));
    }

    public function  afficherAnnoncesMedecine_AfterAuth()
    {
        $annonces = Annonce::where('categorie', 'medecine')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userAuth.medecine', compact('annonces'));
    }

    public function afficherAnnoncesArticle_Maison_AfterAuth()
    {
        $annonces = Annonce::where('categorie', 'article_maison')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userAuth.article_maison', compact('annonces'));
    }

    public function afficherAnnoncesAuto_AfterAuth()
    {
        $annonces = Annonce::where('categorie', 'auto')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userAuth.auto', compact('annonces'));
    }

    public function  afficherAnnoncesAutre_AfterAuth()
    {
        $annonces = Annonce::where('categorie', 'autre')
                            ->with('utilisateur')
                            ->orderByDesc('created_at')
                            ->get();
        return view('categories.userAuth.autre', compact('annonces'));
    }

 // Modifier la méthode detailsAnnonce dans le contrôleur recupererAnnonce
public function detailsAnnonce($id)
{
    // Récupérer les détails de l'annonce en fonction de l'ID
    $annonce = Annonce::find($id);

    // Vérifier si l'annonce existe
    if (!$annonce) {
        abort(404); // Renvoyer une erreur 404 si l'annonce n'est pas trouvée
    }

    // Stocker l'ID de l'annonce dans la session
    session()->put('annonce_id', $id);

    // Passer les détails à la vue
    return view('annonces.details', compact('annonce'));
}



}

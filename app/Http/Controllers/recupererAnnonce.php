<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; 
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
 use App\Models\Notification; // Ajoutez ceci en haut de votre fichier de contrôleur

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


public function recupererAnnonce(Request $request, $annonceId)
{
    // Vérifier si l'utilisateur est connecté
    if (auth()->check()) {
        // Récupérer l'utilisateur connecté
        $utilisateurConnecte = auth()->user();

        // Récupérer l'annonce à partir de l'ID
        $annonce = Annonce::find($annonceId);

        // Vérifier si l'annonce existe
        if (!$annonce) {
            return response()->json(['error' => 'L\'annonce n\'existe pas.'], 404);
        }

        // Vérifier si l'utilisateur connecté est l'auteur de l'annonce
        if ($utilisateurConnecte->id != $annonce->id_utilisateur) {
            // Envoyer la demande à l'utilisateur qui a créé l'annonce
            $utilisateurConnecte->envoyerDemandeRecuperation($annonceId);

            // Créer une notification
            Notification::create([
                'user_id' => $annonce->id_utilisateur,
                'annonce_id' => $annonce->id,
                'message' => 'Votre annonce "' . $annonce->titre . '" a reçu une demande de récupération de la part de ' . $utilisateurConnecte->Nom_Complet
            ]);

            // Retourner une réponse JSON avec un message de succès
            return response()->json(['message' => 'Votre demande a été envoyée avec succès à '.$annonce->utilisateur->Nom_Complet.'.'], 200);
        } else {
            // L'utilisateur est l'auteur de l'annonce, ne peut pas récupérer sa propre annonce
            return response()->json(['error' => 'Vous ne pouvez pas récupérer votre propre annonce.'], 403);
        }
    } else {
        // L'utilisateur n'est pas connecté, retourner une réponse JSON avec un message d'erreur
        return response()->json(['error' => 'Vous devez vous connecter pour envoyer une demande de récupération.'], 401);
    }
}



}

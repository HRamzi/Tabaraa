<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Annonce;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function Profile()
    {
        return view('profile');
    }


    public function afficherMesAnnonces()
    {
        return view('mesAnnonce');
    }

    public function mesAnnonces()
    {
        // Récupérer les annonces de l'utilisateur authentifié
        $annonces = Annonce::where('id_utilisateur', Auth::id())->get();
        // Charger la vue "mes-annonces" avec les annonces récupérées
        return view('mesAnnonces', compact('annonces'));
    }

    public function afficherFormulaireModifierNumeroTelephone()
    {
        $user = auth()->user();
        return view('profileSettings.numTelephone');
    }
    public function verifierNumeroTelephone(Request $request)
    {
        $numeroTelephone = $request->input('numero_telephone_actuel');

        $user = auth()->user();

        // Vérifier si l'utilisateur existe et si son numéro de téléphone correspond à celui envoyé
        if ($user->numero_telephone == $numeroTelephone) {
            // Le numéro de téléphone correspond à celui de l'utilisateur
            $exists = true;
        } else {
            // Le numéro de téléphone ne correspond pas à celui de l'utilisateur
            $exists = false;
        }

        return response()->json(['exists' => $exists]);
    }
    public function modifierNumeroTelephone(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nouveau_numero_telephone' => 'required|string|max:255',
        ]);

        // Logique pour modifier le numéro de téléphone de l'utilisateur
        $user = auth()->user();
        $user->numero_telephone = $request->input('nouveau_numero_telephone');
        $user->Utilisateur::save();

        return redirect()->back()->with('success', 'Numéro de téléphone mis à jour avec succès.');
    }

    public function afficherModifierMotDePasse()
    {
        $user = auth()->user();
        return view('profileSettings.modifierMotPasse');
    }
public function modifierMotDePasse(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'mot_de_passe_actuel' => 'required',
        'nouveau_mot_de_passe' => 'required|string|min:8|confirmed',
    ]);

    // Récupérer l'utilisateur authentifié
    $user = Auth::user();

    // Vérifier si le mot de passe actuel correspond au mot de passe de l'utilisateur
    if (!Hash::check($request->mot_de_passe_actuel, $user->mot_de_passe)) {
        return redirect()->back()->withErrors(['mot_de_passe_actuel' => 'Le mot de passe actuel est incorrect.']);
    }

    // Mettre à jour le mot de passe de l'utilisateur
    $user->mot_de_passe = Hash::make($request->nouveau_mot_de_passe);
    $user->save();

    return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
}







    public function afficherSupprimerCompte()
    {
        $user = auth()->user();
        return view('profileSettings.suppCompte');
    }
    public function supprimerCompte()
    {
        // Logique pour supprimer le compte de l'utilisateur
        $user = auth()->user();
        $user->Utilisateur::delete();
        return redirect('home')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}

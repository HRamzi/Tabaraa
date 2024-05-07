<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;
use App\Models\Utilisateur;

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

    public function afficherFormulaireModifierNumeroTelephone(){
        $user = auth()->user();
        return view('profileSettings.numTelephone', compact('user'));
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


    public function modifierEmail(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nouvel_email' => 'required|string|email|max:255|unique:users,email',
        ]);

        // Logique pour modifier l'email de l'utilisateur
        $user = auth()->user();
        $user->email = $request->input('nouvel_email');
        $user->Utilisateur::save();
        return redirect()->back()->with('success', 'Email mis à jour avec succès.');
    }

    public function modifierMotDePasse(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nouveau_mot_de_passe' => 'required|string|min:8|confirmed',
        ]);

        // Logique pour modifier le mot de passe de l'utilisateur
        $user = auth()->user();
        $user->password = bcrypt($request->input('nouveau_mot_de_passe'));
        $user->Utilisateur::save();
        return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
    }

    public function supprimerCompte()
    {
        // Logique pour supprimer le compte de l'utilisateur
        $user = auth()->user();
        $user->Utilisateur::delete();
        return redirect('home')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}

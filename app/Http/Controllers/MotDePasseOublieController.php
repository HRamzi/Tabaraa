<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;

class MotDePasseOublieController extends Controller
{
    // Méthode pour afficher le formulaire de réinitialisation du mot de passe
    public function afficherFormulaire()
    {
        return view('oublieMotDePasse');
    }

    // Méthode pour réinitialiser le mot de passe
    public function reinitialiserMotDePasse(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8', // Valider le nouveau mot de passe
        ]);

        // Vérifier si l'email correspond à un utilisateur existant
        $user = Utilisateur::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Adresse e-mail non trouvée.']);
        }

        // Si l'utilisateur existe, stocker le nouveau mot de passe dans la base de données
        $user->mot_de_passe = Hash::make($request->password);
        $user->save();

        // Envoyer un e-mail de confirmation (vous devez implémenter cette fonctionnalité)

        // Rediriger vers la page de connexion avec un message de succès
        return response()->json(['success' => true, 'message' => 'Votre mot de passe a été réinitialisé avec succès. Veuillez vous connecter avec votre nouveau mot de passe.']);
    }


}


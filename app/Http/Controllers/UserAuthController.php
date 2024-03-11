<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function inscription()
    {
        return view("auth.inscription");
    }

    public function inscriptionUtilisateur(Request $request)
    {
        // Validation des champs
        $request->validate([
            'Nom_Complet' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs|max:255',
            'Numero_telephone' => 'required|string|max:20',
            'mot_de_passe' => 'required|string|min:8',
            'confirmation_mot_de_passe' => 'required|string|same:mot_de_passe',
        ]);

        try {
            // Création de l'utilisateur
            $utilisateur = new Utilisateur();
            $utilisateur->Nom_Complet = $request->Nom_Complet;
            $utilisateur->email = $request->email;
            $utilisateur->Numero_telephone = $request->Numero_telephone;
            $utilisateur->mot_de_passe = Hash::make($request->mot_de_passe);
            $utilisateur->save();
        } catch (\Exception $e) {
            // En cas d'erreur, rediriger vers la page d'inscription avec un message d'erreur
            return redirect('/inscription')->withErrors(['error' => 'Une erreur s\'est produite lors de la création du profil.']);
        }

        // Redirection vers la page de profil avec un message de succès
        return redirect('/profile')->with('success', 'Votre profil a été créé avec succès !');
    }

    public function connexion()
    {
        return view("auth.connexion");
    }


    public function connexionUtilisateur(Request $request)
{
    $credentials = $request->only(['email', 'mot_de_passe']);

    // Recherche de l'utilisateur par son adresse email
    $user = Utilisateur::where('email', $credentials['email'])->first();

    // Vérification de l'existence de l'utilisateur et de la validité du mot de passe
    if ($user && password_verify($credentials['mot_de_passe'], $user->mot_de_passe)) {
        auth()->login($user);

        // Redirection de l'utilisateur vers la page d'accueil
        return redirect('/home');
    }

    // Si les identifiants sont invalides, retourner une réponse d'erreur
    throw ValidationException::withMessages([
        'email' => ['Cet email et/ou ce mot de passe est incorrect.'],
    ]);
}

    public function profile(){
        return view('profile');
    }


    public function deconnexionUtilisateur()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Deconnexion avec success');
    }
}

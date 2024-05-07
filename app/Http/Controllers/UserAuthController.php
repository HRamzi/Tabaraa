<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Models\Utilisateur;
use App\Models\Annonce;

class UserAuthController extends Controller
{
    public function afficherFormulaireInscription()
    {
        return view("auth.inscription");
    }

    public function inscription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nom_Complet' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs|max:255',
            'numero_telephone' => [
                'required',
                'string',
                'max:20',
                function ($attribute, $value, $fail) {
                    $existingUser = Utilisateur::where('numero_telephone', $value)->first();
                    if ($existingUser) {
                        $fail('Le numéro de téléphone existe déjà.');
                    }
                },
            ],
            'mot_de_passe' => 'required|string|min:8',
            'confirmation_mot_de_passe' => 'required|string|same:mot_de_passe',
            'photo_profile' => 'required|image|mimes:jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            if ($request->hasFile('photo_profile')) {
                if ($request->file('photo_profile')->isValid()) {
                    $imagePath = $request->photo_profile->store('uploads', 'public');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Le fichier téléchargé n\'est pas valide.');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Veuillez sélectionner une image.');
            }

            $user = Utilisateur::create([
                'Nom_Complet' => $request->Nom_Complet,
                'email' => $request->email,
                'numero_telephone' => $request->numero_telephone,
                'mot_de_passe' => Hash::make($request->mot_de_passe),
                'photo_profile' => $imagePath,
                'role' => 'user', // Affecter le rôle de l'utilisateur comme 'user'
            ]);
            Auth::login($user);

            return redirect('profile')->with('success', 'Votre profil a été créé avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création du profil.']);
        }
    }

    public function afficherFormulaireConnexion(Request $request)
    {
        return view("auth.connexion");
    }

    public function connexion(Request $request)
    {
        $user = Utilisateur::where("email", $request->input("email"))->first();

        if (!$user || !Hash::check($request->input("mot_de_passe"), $user->mot_de_passe)) {
            $errors = [
                'email' => ['Email and/or password incorrect.'],
            ];
            return redirect()->back()->withErrors($errors);
        }

        Auth::login($user);
        return redirect('/user-home');
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}

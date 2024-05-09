<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Models\Utilisateur;

class UserAuthController extends Controller
{
    public function afficherFormulaireInscription()
    {
        return view("auth.inscription");
    }

    public function inscription(Request $request)
    {
        $messages = [
            'Nom_Complet.required' => 'Le champ Nom complet est obligatoire.',
            'Nom_Complet.string' => 'Le champ Nom complet doit être une chaîne de caractères.',
            'Nom_Complet.max' => 'Le champ Nom complet ne doit pas dépasser :max caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'L\'adresse email est déjà utilisée.',
            'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
            'numero_telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'numero_telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'numero_telephone.max' => 'Le numéro de téléphone ne doit pas dépasser :max caractères.',
            'numero_telephone.unique' => 'Le numéro de téléphone existe déjà.',
            'mot_de_passe.required' => 'Le mot de passe est obligatoire.',
            'mot_de_passe.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'mot_de_passe.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'confirmation_mot_de_passe.required' => 'La confirmation du mot de passe est obligatoire.',
            'confirmation_mot_de_passe.string' => 'La confirmation du mot de passe doit être une chaîne de caractères.',
            'confirmation_mot_de_passe.same' => 'La confirmation du mot de passe doit correspondre au mot de passe.',
            'photo_profile.required' => 'La photo de profil est obligatoire.',
            'photo_profile.image' => 'Le fichier doit être une image.',
            'photo_profile.mimes' => 'Le fichier doit être de type : :values.',
            'photo_profile.max' => 'Le fichier ne doit pas dépasser :max kilo-octets.',
        ];

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
        ], $messages);

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
                'role' => 'utilisateur'
            ]);
            Auth::login($user);
            session(['user' => Auth::user()]);

            return redirect()->route('profile')->with('success', 'Votre profile a été créé avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création du profil.']);
        }
    }


    public function afficherFormulaireConnexion()
    {
        return view("auth.connexion");
    }

    public function connexion(Request $request)
    {
        $user = Utilisateur::where("email", $request->input("email"))->first();

        if (!$user || !Hash::check($request->input("mot_de_passe"), $user->mot_de_passe)) {
            $errors = [
                'email' => ['Email et/ou Mot de passe incorrect.'],
            ];
            return redirect()->back()->withErrors($errors);
        }

        Auth::login($user);
        session(['user' => Auth::user()]);

        // Redirection en fonction du rôle de l'utilisateur
        if ($user->role === 'admin') {
            return redirect('/admin-home');
        } else {
            return redirect('/user-home');
        }
    }

    public function deconnexion(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        session()->forget('user');

        return redirect('home')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}

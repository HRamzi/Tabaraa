<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;
use App\Models\Categorie;

class CreeAnnonceController extends Controller
{
    public function creeAnnonce(Request $request)
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupérer toutes les annonces
            $annonces = Annonce::all();
            $categories = Categorie::all();
            return view('annonces.cree', ['annonces' => $annonces, 'categories' => $categories]);
        } else {
            return redirect('/connexion')->with('error', 'Vous devez être connecté pour créer une annonce.');
        }
    }


    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255|filled',
            'ville' => 'required|string|max:255',
            'numero_telephone' => 'required|string|max:20',
            'description' => 'required|string',
            'photo' => 'required|image|max:2048',
        ], [
            'titre.required' => 'Le titre est requis.',
            'titre.filled' => 'Le titre ne peut pas être vide.',
            'photo.required' => 'La photo est requis.',
            'photo.filled' => 'La photo ne peut pas être vide.',
            'description.required' => 'La description est requis.',
            'description.filled' => 'La description ne peut pas être vide.',
        ]);

        // Enregistrer l'annonce dans la base de données
        $annonce = new Annonce();
        $annonce->titre = $request->titre;
        $annonce->categorie = $request->categorie;
        $annonce->ville = $request->ville;
        $annonce->numero_telephone = $request->numero_telephone;
        $annonce->description = $request->description;
        $annonce->id_utilisateur = auth()->user()->id;
        // Enregistrer l'image
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $imagePath = $request->photo->store('uploads', 'public');
                $annonce->photo = $imagePath;
            } else {
                return redirect()->back()->withInput()->with('error', 'Le fichier téléchargé n\'est pas valide.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Veuillez sélectionner une image.');
        }

        $annonce->save();

        // Rediriger l'utilisateur vers la page d'accueil après la création de l'annonce
        return redirect('user-home')->with('success', 'Annonce créée avec succès.');
    }

    public function recherche(Request $request)
{
    // Validation des données d'entrée
    $request->validate([
        'termes' => 'nullable|string|max:255',
        'ville' => 'nullable|string|max:255',
    ]);

    $termes = $request->input('termes');
    $ville = $request->input('ville');

    try {
        // Appel de la méthode de recherche dans le modèle Annonce
        $annoncesQuery = Annonce::query();

        // Recherche par termes si spécifiés
        if ($termes) {
            $annoncesQuery->where(function ($query) use ($termes) {
                $query->where('titre', 'like', "%$termes%")
                    ->orWhere('description', 'like', "%$termes%");
            });
        }

        // Recherche par ville si spécifiée
        if ($ville) {
            if ($termes) {
                $annoncesQuery->where('ville', 'like', "%$ville%");
            } else {
                // Si aucun terme n'est spécifié, rechercher uniquement par ville
                $annoncesQuery->where('ville', '=', $ville);
            }
        }

        // Exécuter la requête et récupérer les résultats
        $annonces = $annoncesQuery->get();

        // Retourner les résultats à la vue
        return view('annonces.recherche', compact('annonces'));
    } catch (\Exception $e) {
        // Gestion des erreurs
        return back()->withError('Une erreur s\'est produite lors de la recherche.');
    }
}
    public function formulaireModifierAnnonce(Annonce $annonce)
    {
        $annonce = Annonce::findOrFail($annonce->id);
        $categories = Categorie::all();

        return view('annonces.formulaireModifierAnnonce', compact('annonce', 'categories'));
    }

    public function modifierAnnonce(Request $request, Annonce $annonce)
    {
        $request->validate([
            'titre' => 'required|string|max:255|filled',
            'ville' => 'required|string|max:255',
            'numero_telephone' => 'required|string|max:20',
            'description' => 'required|string',
            'photo' => 'image|max:2048', // Ne pas rendre la photo obligatoire pour la modification
        ], [
            'titre.required' => 'Le titre est requis.',
            'titre.filled' => 'Le titre ne peut pas être vide.',
            'numero_telephone.required' => 'Le numéro de téléphone ne peut pas être vide.',
            'numero_telephone.filled' => 'Le numéro de téléphone ne peut pas être vide.',
            'description.required' => 'La description est requis.',
            'description.filled' => 'La description ne peut pas être vide.',
        ]);

        // Mettre à jour les champs sauf la photo
        $annonce->update($request->except('photo'));

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads', 'public');
            $annonce->update(['photo' => $photoPath]);
        }

        return redirect('/user-home')->with('success', 'Annonce mise à jour avec succès.');
    }

    public function supprimerAnnonce($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->route('mesAnnonces')->with('success', 'Annonce supprimée avec succès.');
    }
}

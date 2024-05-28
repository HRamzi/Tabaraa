<?php

namespace App\Http\Controllers;
  use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;
use App\Models\Categorie;

class CreeAnnonceController extends Controller
{
  public function create()
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        return view('annonces.cree', ['categories' => $categories]);
    }



public function store(Request $request)
{
    // Valider les données du formulaire
    $validator = Validator::make($request->all(), [
        'titre' => 'required|string|max:255|filled',
        'categorie' => 'required|string|max:255',
        'ville' => 'required|string|max:255',
        'numero_telephone' => 'required|string|max:20',
        'photo' => 'required|image|max:2048',
        'description' => 'required|string',
    ], [
        'titre.required' => 'Le titre est requis.',
        'titre.filled' => 'Le titre ne peut pas être vide.',
        'categorie.required' => 'La catégorie est requise.',
        'categorie.filled' => 'La catégorie ne peut pas être vide.',
        'ville.required' => 'La ville est requise.',
        'ville.filled' => 'La ville ne peut pas être vide.',
        'numero_telephone.required' => 'Le numéro de téléphone est requis.',
        'numero_telephone.filled' => 'Le numéro de téléphone ne peut pas être vide.',
        'photo.required' => 'La photo est requise.',
        'photo.filled' => 'La photo ne peut pas être vide.',
        'description.required' => 'La description est requise.',
        'description.filled' => 'La description ne peut pas être vide.',
    ]);

    // Vérifier si la validation a échoué
    if ($validator->fails()) {
        // Renvoyer les erreurs de validation au format JSON
        return response()->json(['code' => 0, 'errors' => $validator->errors()], 400);
    }

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
            return response()->json(['code' => 0, 'message' => 'Le fichier téléchargé n\'est pas valide.'], 400);
        }
    } else {
        return response()->json(['code' => 0, 'message' => 'Veuillez sélectionner une image.'], 400);
    }

    if ($annonce->save()) {
        // Réponse de succès
        return response()->json(['code' => 1, 'message' => 'Annonce créée avec succès.'], 200);
    } else {
        // En cas d'erreur lors de l'enregistrement
        return response()->json(['code' => 0, 'message' => 'Une erreur s\'est produite lors de la création de l\'annonce.'], 500);
    }
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
        'description.required' => 'La description est requise.',
        'description.filled' => 'La description ne peut pas être vide.',
    ]);

    // Mettre à jour les champs sauf la photo
    $annonce->update($request->except('photo'));

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('uploads', 'public');
        $annonce->update(['photo' => $photoPath]);
    }

    return response()->json(['code' => 1, 'message' => 'Annonce mise à jour avec succès.'], 200);
}


    public function supprimerAnnonce($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->route('mesAnnonces')->with('success', 'Annonce supprimée avec succès.');
    }
}

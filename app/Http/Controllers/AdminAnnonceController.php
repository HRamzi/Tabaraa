<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AdminAnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::with('utilisateur')->get();
        return view('admin.annonces.index', compact('annonces'));
    }

    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('admin.annonces.show', compact('annonce'));
    }

    public function destroy($id)
{
    $annonce = Annonce::findOrFail($id);
    $annonce->delete();
    return redirect()->route('admin.annonces.index')->with('success', 'Annonce supprimée avec succès');
}

}

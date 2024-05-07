<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class AdminUserController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('admin.utilisateurs.index', compact('utilisateurs'));
    }

    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('admin.utilisateurs.edit', compact('utilisateur'));
    }

    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}

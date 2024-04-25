<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Annonce;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function UserIndex()
    {
        return view('homeAfterAuth');
    }

    public function afficherUserHomeAnnonces()
    {
        $vetements = Annonce::where('categorie', 'vetements')->inRandomOrder()->limit(4)->get();
        $medecine = Annonce::where('categorie', 'medecine')->inRandomOrder()->limit(4)->get();
        $autre = Annonce::where('categorie', 'autre')->inRandomOrder()->limit(4)->get();

        return view('homeAfterAuth', compact('vetements', 'medecine', 'autre'));
    }
    public function afficherHomeAnnonces()
    {

        $vetements = Annonce::where('categorie', 'vetements')->inRandomOrder()->limit(4)->get();
        $medecine = Annonce::where('categorie', 'medecine')->inRandomOrder()->limit(4)->get();
        $autre = Annonce::where('categorie', 'autre')->inRandomOrder()->limit(4)->get();

        return view('home', compact('vetements', 'medecine', 'autre'));
    }
}

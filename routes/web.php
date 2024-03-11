<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;


Route::get("/", function () {
    return view("home");
});

Route::get('/connexion', [UserAuthController::class, 'connexion'])->name('connexion');
Route::post('/connexion-utilisateur', [UserAuthController::class, 'connexionUtilisateur'])->name('connexion-utilisateur');

Route::get('/inscription', [UserAuthController::class, 'inscription'])->name('inscription');
Route::post('/inscription-utilisateur', [UserAuthController::class, 'inscriptionUtilisateur'])->name('inscription-utilisateur');

Route::get('/profile', [UserAuthController::class, 'profile'])->name('profile');



Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

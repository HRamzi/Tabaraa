<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\recupererAnnonce;
use App\Http\Controllers\CreeAnnonceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PusherController;

Route::get('/', [HomeController::class, 'afficherHomeAnnonces']);
Route::get('/home', [HomeController::class, 'afficherHomeAnnonces'])->name('home');

Route::get('/connexion', [UserAuthController::class, 'afficherFormulaireConnexion'])->name('afficherFormulaireConnexion');
Route::post('/connexion', [UserAuthController::class, 'connexion'])->name('connexion');
Route::get('/inscription', [UserAuthController::class, 'afficherFormulaireInscription'])->name('afficherFormulaireInscription');
Route::post('/inscription', [UserAuthController::class, 'inscription'])->name('inscription');

Route::get('/user-home', [HomeController::class, 'afficherUserHomeAnnonces']);

Route::get('/deconnexion', [UserAuthController::class, 'deconnexion'])->name('deconnexion');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/mesAnnonces', [ProfileController::class, 'mesAnnonces'])->name('mesAnnonces');
Route::post('/modifier-mot-de-passe', [ProfileController::class, 'modifierMotDePasse'])->name('modifier-mot-de-passe');
Route::post('/modifier-numero-telephone', [ProfileController::class, 'modifierNumeroTelephone'])->name('modifier-numero-telephone');
Route::post('/supprimer-compte', [ProfileController::class, 'supprimerCompte'])->name('supprimerCompte');

Route::prefix('userNotAuth')->group(function () {
    Route::get('/categories/vetements', [recupererAnnonce::class, 'afficherAnnoncesVetement'])->name('vetement');
    Route::get('/categories/livres', [recupererAnnonce::class, 'afficherAnnoncesLivre'])->name('livre');
    Route::get('/categories/medecine', [recupererAnnonce::class, 'afficherAnnoncesMedecine'])->name('medecine');
    Route::get('/categories/article_maison', [recupererAnnonce::class, 'afficherAnnoncesArticle_Maison'])->name('article_maison');
    Route::get('/categories/auto', [recupererAnnonce::class, 'afficherAnnoncesAuto'])->name('auto');
    Route::get('/categories/autre', [recupererAnnonce::class, 'afficherAnnoncesAutre'])->name('autre');
});

Route::prefix('userAuth')->group(function () {
    Route::get('/categories/vetements', [recupererAnnonce::class, 'afficherAnnoncesVetement_AfterAuth'])->name('userAuth_vetement');
    Route::get('/categories/livres', [recupererAnnonce::class, 'afficherAnnoncesLivre_AfterAuth'])->name('userAuth_livre');
    Route::get('/categories/medecine', [recupererAnnonce::class, 'afficherAnnoncesMedecine_AfterAuth'])->name('userAuth_medecine');
    Route::get('/categories/article_maison', [recupererAnnonce::class, 'afficherAnnoncesArticle-Maison_AfterAuth'])->name('userAuth_article_maison');
    Route::get('/categories/auto', [recupererAnnonce::class, 'afficherAnnoncesAuto_AfterAuth'])->name('userAuth_auto');
    Route::get('/categories/autre', [recupererAnnonce::class, 'afficherAnnoncesAutre_AfterAuth'])->name('userAuth_autre');
});

Route::get('/annonces/cree', [CreeAnnonceController::class, 'creeAnnonce'])->name('annonces.cree');
Route::post('/annonces', [CreeAnnonceController::class, 'store'])->name('annonces.store');
Route::get('/annonces/recherche', [CreeAnnonceController::class, 'recherche'])->name('rechercher');
Route::put('/annonces/{annonce}/modifier', [CreeAnnonceController::class, 'formulaireModifierAnnonce'])->name('annonces.modifier');
Route::post('/annonces/{annonce}', [CreeAnnonceController::class, 'modifierAnnonce'])->name('annonces.update');
Route::delete('/annonces/{id}',[CreeAnnonceController::class, 'supprimerAnnonce'])->name('annonces.supprimer');

Route::get('/annonce/{id}', [recupererAnnonce::class, 'detailsAnnonce'])->name('annonce.details');

Route::get('/messages', [PusherController::class, 'MessageIndex'])->name('messages');
 
Route::post('/receive', [PusherController::class, 'receive'])->name('receive');
Route::get('/unread-message-count', [PusherController::class, 'getUnreadMessageCount'])->name('getUnreadMessageCount');
Route::get('/message-count', [PusherController::class, 'getMessageCount'])->name('getMessageCount');
Route::post('/broadcast', [PusherController::class, 'broadcast'])->name('broadcast');

Route::post('/mark-all-messages-as-read', [PusherController::class, 'markAllMessagesAsRead'])->name('markAllMessagesAsRead');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\recupererAnnonce;
use App\Http\Controllers\CreeAnnonceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminAnnonceController;
use App\Http\Controllers\MotDePasseOublieController;
use App\Http\Controllers\NotificationController;


Route::get('/', [HomeController::class, 'afficherHomeAnnonces']);
Route::get('/home', [HomeController::class, 'afficherHomeAnnonces'])->name('home');

// Routes pour l'authentification
Route::get('/connexion', [UserAuthController::class, 'afficherFormulaireConnexion'])->name('afficherFormulaireConnexion');
Route::post('/connexion', [UserAuthController::class, 'connexion'])->name('connexion');
Route::get('/inscription', [UserAuthController::class, 'afficherFormulaireInscription'])->name('afficherFormulaireInscription');
Route::post('/inscription', [UserAuthController::class, 'inscription'])->name('inscription');
Route::get('/deconnexion', [UserAuthController::class, 'deconnexion'])->name('deconnexion');

// Routes pour les utilisateurs authentifiés
Route::get('/user-home', [HomeController::class, 'afficherUserHomeAnnonces'])
    ->middleware('auth')
    ->name('userHome');


// Routes pour l'administration
Route::get('/admin-home', [AdminHomeController::class, 'index'])->name('admin.home');

// Routes pour la gestion des utilisateurs d'administration
Route::prefix('admin')->group(function () {
    Route::get('/utilisateurs', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/utilisateurs/{utilisateur}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/utilisateurs/{utilisateur}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/utilisateurs/{utilisateur}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

// Routes pour la gestion des annonces d'administration
Route::prefix('admin')->group(function () {
    Route::get('/annonces', [AdminAnnonceController::class, 'index'])->name('admin.annonces.index');
    Route::get('/annonces/{annonce}', [AdminAnnonceController::class, 'show'])->name('admin.annonces.show');
    Route::delete('/annonces/{annonce}', [AdminAnnonceController::class, 'destroy'])->name('admin.annonces.destroy');
});
Route::post('/recuperer-annonce/{annonce}', [recupererAnnonce::class, 'recupererAnnonce'])->name('recupererAnnonce');
// Routes pour la gestion du profil utilisateur
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/mesAnnonces', [ProfileController::class, 'mesAnnonces'])->name('mesAnnonces');
    Route::get('/modifier-nom-complet', [ProfileController::class, 'afficherModifierNom'])->name('afficher_modifier_nom_complet');
    Route::post('/modifier', [ProfileController::class, 'modifierNom'])->name('modifier_Nom_Complet');
    Route::get('/modifier-mot-de-passe', [ProfileController::class, 'afficherModifierMotDePasse'])->name('afficher_modifier_mot_de_passe');
    Route::post('/modifier-mot-de-passe', [ProfileController::class, 'modifierMotDePasse'])->name('modifier_mot_de_passe');
    Route::get('/modifier-numero-telephone', [ProfileController::class, 'afficherFormulaireModifierNumeroTelephone'])->name('afficher_modifier_numero_telephone');
    Route::post('/verifier-Numero-telephone', [ProfileController::class, 'verifierNumeroTelephone'])->name('verifierNumeroTelephone');
    Route::post('/modifier-numero-telephone', [ProfileController::class, 'modifierNumeroTelephone'])->name('modifier_numero_telephone');
    Route::get('/supprimer-compte', [ProfileController::class, 'afficherSupprimerCompte'])->name('afficher_supprimer_Compte');
    Route::post('/supprimer-compte', [ProfileController::class, 'supprimerCompte'])->name('supprimerCompte');
});
Route::get('/mot-de-passe-oublie', [MotDePasseOublieController::class, 'afficherFormulaire'])->name('oublie_mot_de_passe');
Route::post('/mot-de-passe-oublie', [MotDePasseOublieController::class, 'reinitialiserMotDePasse'])->name('reinitialiser_mot_de_passe');

// Autres routes pour les utilisateurs non authentifiés
Route::prefix('userNotAuth')->group(function () {
    Route::get('/categories/vetements', [recupererAnnonce::class, 'afficherAnnoncesVetement'])->name('vetement');
    Route::get('/categories/livres', [recupererAnnonce::class, 'afficherAnnoncesLivre'])->name('livre');
    Route::get('/categories/medecine', [recupererAnnonce::class, 'afficherAnnoncesMedecine'])->name('medecine');
    Route::get('/categories/article_maison', [recupererAnnonce::class, 'afficherAnnonces_Article_Maison'])->name('article_maison');
    Route::get('/categories/auto', [recupererAnnonce::class, 'afficherAnnoncesAuto'])->name('auto');
    Route::get('/categories/autre', [recupererAnnonce::class, 'afficherAnnoncesAutre'])->name('autre');
});

// Autres routes pour les utilisateurs authentifiés
Route::prefix('userAuth')->middleware('auth')->group(function () {
    Route::get('/categories/vetements', [recupererAnnonce::class, 'afficherAnnoncesVetement_AfterAuth'])->name('userAuth_vetement');
    Route::get('/categories/livres', [recupererAnnonce::class, 'afficherAnnoncesLivre_AfterAuth'])->name('userAuth_livre');
    Route::get('/categories/medecine', [recupererAnnonce::class, 'afficherAnnoncesMedecine_AfterAuth'])->name('userAuth_medecine');
    Route::get('/categories/article_maison', [recupererAnnonce::class, 'afficherAnnoncesArticle_Maison_AfterAuth'])->name('userAuth_articleMaison');
    Route::get('/categories/auto', [recupererAnnonce::class, 'afficherAnnoncesAuto_AfterAuth'])->name('userAuth_auto');
    Route::get('/categories/autre', [recupererAnnonce::class, 'afficherAnnoncesAutre_AfterAuth'])->name('userAuth_autre');
});

// Autres routes pour la création, la modification, etc. d'annonces

Route::get('/annonces/cree', [CreeAnnonceController::class, 'creeAnnonce'])->name('annonces.cree');
Route::post('/annonces', [CreeAnnonceController::class, 'store'])->name('annonces.store');
Route::post('/annonces/recherche', [CreeAnnonceController::class, 'recherche'])->name('rechercher');
Route::put('/annonces/{annonce}/modifier', [CreeAnnonceController::class, 'formulaireModifierAnnonce'])->name('annonces.modifier');
Route::post('/annonces/{annonce}', [CreeAnnonceController::class, 'modifierAnnonce'])->name('annonces.update');
Route::delete('/annonces/{id}', [CreeAnnonceController::class, 'supprimerAnnonce'])->name('annonces.supprimer');


// Routes pour afficher les détails d'une annonce
// Modifier le fichier de routes pour inclure la route 'annonces.details' avec la méthode GET
Route::get('/annonce/{id}', [recupererAnnonce::class, 'detailsAnnonce'])->name('annonces.details');

// Routes pour la messagerie
Route::get('/messages', [PusherController::class, 'MessageIndex'])->name('messages');
Route::post('/receive', [PusherController::class, 'receive'])->name('receive');
Route::get('/unread-message-count', [PusherController::class, 'getUnreadMessageCount'])->name('getUnreadMessageCount');
Route::get('/message-count', [PusherController::class, 'getMessageCount'])->name('getMessageCount');
Route::post('/broadcast', [PusherController::class, 'broadcast'])->name('broadcast');
Route::post('/mark-all-messages-as-read', [PusherController::class, 'markAllMessagesAsRead'])->name('markAllMessagesAsRead');
Route::get('/get-notifications', [NotificationController::class, 'getNotifications'])->name('getNotifications');
Route::get('/notification/count', [NotificationController::class, 'getNotificationCount'])->name('getNotificationCount');
Route::get('/notifications', [NotificationController::class, 'showNotificationsView'])->name('notifications');

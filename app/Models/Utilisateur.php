<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'Nom_Complet',
        'email',
        'numero_telephone',
        'mot_de_passe',
        'photo_profile',
        'role',
    ];
// Dans votre modèle Utilisateur
public function isAdmin()
{
    return $this->role === 'admin'; // Assurez-vous d'ajuster cela en fonction de votre logique de rôles
}

    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'id_utilisateur');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function envoyerDemandeRecuperation($annonceId)
    {
        $annonce = Annonce::find($annonceId);

        if (!$annonce) {
            return false;
        }

        if ($this->id != $annonce->id_utilisateur) {
            return false;
        }

        // Logique d'envoi de la demande de récupération

        return true;
    }
}

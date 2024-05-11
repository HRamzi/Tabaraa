<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    // Définir les attributs mass assignable
    protected $fillable = [
        'Nom_Complet',
        'email',
        'numero_telephone',
        'mot_de_passe',
        'photo_profile',
        'role',
    ];
}

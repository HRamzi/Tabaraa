<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Utilisateurs as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'Nom_Complet',
        'email',
        'Numero_telephone',
        'mot_de_passe'
    ];
}

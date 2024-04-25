<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Utilisateurs as Authenticatable;
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

    public function markAsAuthenticated()
    {
        $this->est_authentifie = true;
        $this->save();
    }
}

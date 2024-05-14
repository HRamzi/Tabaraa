<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'annonce_id',
        'message',
        'read'
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(Utilisateur::class, 'user_id');
    }

    // Relation avec l'annonce
    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }

    // Méthode pour obtenir le titre de l'annonce
    public function annonce_title()
    {
        return $this->annonce->titre;
    }
}

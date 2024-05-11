<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['id_expediteur', 'id_destinataire', 'contenu', 'read'];

    protected $casts = [
        'read' => 'boolean',
    ];

    // Relation avec le modèle Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_expediteur');
    }
}

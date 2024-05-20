<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['id_expediteur', 'id_destinataire', 'id_annonce', 'is_reply','contenu', 'read'];

    protected $casts = [
        'read' => 'boolean',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_expediteur');
    }

   public function destinataire()
    {
        return $this->belongsTo(Utilisateur::class, 'id_destinataire');
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'id_annonce');
    }
}


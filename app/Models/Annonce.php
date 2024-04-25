<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_utilisateur',
        'titre',
        'categorie',
        'ville',
        'numero_telephone',
        'photo',
        'description',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id');
    }
    public static function rechercher($termes)
    {
        return Annonce::where('titre', 'like', '%' . $termes . '%')
                    ->orWhere('description', 'like', '%' . $termes . '%')
                    ->get();
    }
}

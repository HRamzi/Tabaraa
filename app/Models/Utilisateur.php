<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'utilisateurs'; // Définir le nom de la table en minuscules et pluriel

    protected $fillable = [
        'id',
        'Nom_Complet',
        'email',
        'numero_telephone',
        'mot_de_passe',
        'photo_profile',
        'role', // Ajout de la colonne role
    ];

    // ...

    /**
     * Save the user instance to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = [])
    {
        // Validate and sanitize input before saving
        // Example: Implement validation rules for attributes

        return parent::save($options);
    }

    /**
     * Delete the user from the database.
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete()
    {
        // Implement soft delete logic if needed

        return parent::delete();
    }
}

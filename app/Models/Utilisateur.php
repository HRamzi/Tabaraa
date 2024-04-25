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

    protected $table = 'Utilisateurs';

    protected $fillable = [
        'id',
        'Nom_Complet',
        'email',
        'numero_telephone',
        'mot_de_passe',
        'photo_profile',
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'id_utilisateur');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

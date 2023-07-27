<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enclo extends Model
{
    use HasFactory;
    protected $table = 'enclos';
    protected $fillable = ['nom', 'capacite_accueil', 'description'];

    // Attributs supplémentaires (non présents dans la migration)
    // Vous pouvez ajouter ici des relations ou d'autres propriétés spécifiques à votre modèle.
    public function animal()
    {
        return $this->hasMany(Animal::class);
    }
}

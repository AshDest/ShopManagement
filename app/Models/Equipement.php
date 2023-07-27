<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    protected $table = 'equipements';
    protected $fillable = ['nom', 'description', 'date_achat', 'fournisseur', 'date_maintenance_recente', 'frequence_maintenance_recommandee'];

    // Attributs supplémentaires (non présents dans la migration)
    // Vous pouvez ajouter ici des relations ou d'autres propriétés spécifiques à votre modèle.
}

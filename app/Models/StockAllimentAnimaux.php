<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAllimentAnimaux extends Model
{
    use HasFactory;
    protected $table = 'stock_alliment_animauxes';
    protected $fillable = ['nom_article', 'description', 'quantite_en_stock', 'date_ajout_stock', 'date_peremption'];
}

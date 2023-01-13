<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'qte_stock',
        'pu_achat',
        'pu',
        'category_id',
        'designationmesure',
        'updated_at'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
    public function detailvente()
    {
        return $this->hasMany(DetailVente::class);
    }
}
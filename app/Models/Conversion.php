<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'quantite',
        'produit_code',
        'qte_ajout',
        'motif',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
    public function convertis()
    {
        return $this->belongsTo(Produit::class, 'produit_code');
    }
}
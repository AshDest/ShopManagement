<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailVente extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'qte_vente',
        'pu_vente',
        'pt_vente',
        'month',
        'resultat',
        'vente_id',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
    public function vente()
    {
        return $this->belongsTo(Vente::class, 'vente_id');
    }
}
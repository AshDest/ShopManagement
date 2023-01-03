<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'qte_stock',
        'pu',
        'category_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
}

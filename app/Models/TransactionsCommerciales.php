<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsCommerciales extends Model
{
    use HasFactory;
    protected $table = 'transactions_commerciales';
    protected $fillable = ['date_transaction', 'type_transaction', 'animal_id', 'montant_transaction', 'informations_acheteur_vendeur'];
// Relation vers la table "Animaux" (Many-to-One)
public function animal()
{
    return $this->belongsTo(Animal::class, 'animal_id');
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoinsVeterinaires extends Model
{
    use HasFactory;
    protected $table = 'soins_veterinaires';
    protected $fillable = ['animal_id', 'date_soin', 'type_soin', 'notes'];
     // Relation vers la table "Animaux" (Many-to-One)
     public function animal()
     {
         return $this->belongsTo(Animal::class, 'animal_id');
     }
}

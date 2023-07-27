<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'enclos_id',
        'paturage_id',
        'nom',
        'race',
        'espece',
        'date_naissance',
        'sexe',
        'numero_identification',
        'date_deces',
    ];
    public function enclo()
    {
        return $this->belongsTo(Enclo::class, 'enclos_id');
    }

    public function paturage()
    {
        return $this->belongsTo(Paturage::class, 'paturage_id');
    }
    public function soinsveterinaire()
    {
        return $this->hasMany(SoinsVeterinaires::class);
    }
    public function trnasactioncomerciale()
    {
        return $this->hasMany(TransactionsCommerciales::class);
    }
}



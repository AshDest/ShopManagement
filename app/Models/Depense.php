<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'libelle',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
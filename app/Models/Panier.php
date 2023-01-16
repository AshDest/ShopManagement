<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeprod',
        'description',
        'qtvendu',
        'pu_vente',
        'pt_vente',
        'user_id',
    ];
}
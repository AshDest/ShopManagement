<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametrage extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomination',
        'adresse',
        'contact',
        'email',
        'logo',
        'rccm',
        'num_impot',
        'id_national'
    ];
}

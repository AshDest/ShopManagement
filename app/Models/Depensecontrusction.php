<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depensecontrusction extends Model
{
    use HasFactory;

    protected $fillabe =[
        'id',
        'designationdepense',
        'montantdepense',
        'projetcontrustion_id',
        'depensedevise',
    ];
}

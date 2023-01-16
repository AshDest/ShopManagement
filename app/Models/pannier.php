<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pannier extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'pu_vente ',
        'pt_vente',
    ];
}
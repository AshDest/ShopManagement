<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetcontrustion extends Model
{
    use HasFactory;
    protected $fillabe =[
        'id',
        'codeprojet',
        'designationprojet',
        'responsableprojet',
        'contactreponsable',
        'statutprojet'
    ];

}

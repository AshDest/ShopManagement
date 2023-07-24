<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetcontrustion extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'codeprojet',
        'designationprojet',
        'responsableprojet',
        'contactreponsable',
        'statutprojet',
        'date_debit',
        'updated_at',
    ];

    public function depense()
    {
        return $this->hasMany(Depensecontrusction::class);
    }

}

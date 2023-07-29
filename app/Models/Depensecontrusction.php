<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depensecontrusction extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'designationdepense',
        'montantdepense',
        'projetcontrustion_id',
        'depensedevise',
        'date_debit',
        'month'
    ];

    public function projet()
    {
        return $this->belongsTo(Projetcontrustion::class, 'projetcontrustion_id');
    }
}

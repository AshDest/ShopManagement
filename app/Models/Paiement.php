<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'dette_id',
        'montant_paie',
        'reste_paie',
        'user_id',
    ];

    public function dette()
    {
        return $this->belongsTo(Dette::class, 'dette_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

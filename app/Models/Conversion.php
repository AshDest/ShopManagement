<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'motif',
    ];

    public function conversion()
    {
        return $this->belongsTo(Project::class, 'produit_id');
    }
}

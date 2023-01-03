<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'noms',
        'numero',
    ];

    public function dette()
    {
        return $this->hasMany(Dette::class);
    }
}

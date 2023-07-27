<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table = 'employes';
    protected $fillable = ['nomcomplet', 'fonction', 'numero_telephone', 'adresse_email', 'date_embauche', 'salaire'];
    public function getNomCompletAttribute()
    {
        return ucfirst($this->attributes['nomcomplet']);
    }
}

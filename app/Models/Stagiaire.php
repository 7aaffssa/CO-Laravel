<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $primaryKey = 'idS';
    protected $fillable = ['nom', 'prenom', 'age', 'date_naissance'];

    public function notes()
    {
        return $this->hasMany(NoteStagiaire::class, 'idS');
    }
}
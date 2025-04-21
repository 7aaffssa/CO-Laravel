<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteStagiaire extends Model
{
    use HasFactory;

    protected $table = 'note_stagiaires';
    protected $fillable = ['idS', 'note'];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class, 'idS');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $primaryKey = 'idP';
    protected $fillable = ['nom', 'prix', 'idC'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idC');
    }
}
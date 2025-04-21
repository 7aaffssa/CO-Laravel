<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $primaryKey = 'codeM';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'codeM',
        'titre',
        'masse_horaire'
    ];

    protected $casts = [
        'masse_horaire' => 'integer'
    ];
}
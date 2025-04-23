<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email'];

    /**
     * Get the phone associated with the client.
     */
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
    }
}
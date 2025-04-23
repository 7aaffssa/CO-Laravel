<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Phone extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'number', 'type'];

    /**
     * Get the client that owns the phone.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
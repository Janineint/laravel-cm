<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class Artwork extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'artist_id',
        // Add other fillable fields here
    ];

    /**
     * Get the artist that owns the artwork.
     */
    public function artist(): BelongsTo // Define the relationship
    {
        // If your foreign key isn't artist_id, specify it as the second argument
        return $this->belongsTo(Artist::class);
    }
}
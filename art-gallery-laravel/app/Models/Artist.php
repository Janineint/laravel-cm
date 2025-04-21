<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

class Artist extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields (useful for form handling)
    protected $fillable = [
        'preferred_display_name',
        'bio',
        'nationality',
        'birth_year',
        'death_year',
    ];

    /**
     * Get the artworks for the artist.
     */
    public function artworks(): HasMany // Define the relationship
    {
        return $this->hasMany(Artwork::class);
    }
}
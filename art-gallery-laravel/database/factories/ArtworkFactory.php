<?php

namespace Database\Factories;

use App\Models\Artist; // Import Artist
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucwords($this->faker->words(3, true)),
            'description' => $this->faker->text(),
            'image_url' => $this->faker->imageUrl(640, 480, 'art', true),
            // Assign a random existing artist ID or create one
            'artist_id' => Artist::inRandomOrder()->first()->id ?? Artist::factory(),
        ];
    }
}
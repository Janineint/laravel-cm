<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'preferred_display_name' => $this->faker->name(),
            'bio' => $this->faker->paragraph(),
            'nationality' => $this->faker->country(),
            'birth_year' => $this->faker->optional()->year(),
            'death_year' => $this->faker->optional()->year(),
        ];
    }
}
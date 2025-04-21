<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artist; // Import Artist
use App\Models\Artwork; // Import Artwork
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin', // Ensure your User model handles roles
        ]);

        // Create a default artist user
         User::factory()->create([
             'name' => 'Artist User',
             'email' => 'artist@example.com',
             'role' => 'artist',
         ]);

         // Create some regular users
         User::factory(5)->create(['role' => 'user']);


        // Create 10 artists
        $artists = Artist::factory(10)->create();

        // Create 30 artworks, assigning them to the created artists
        Artwork::factory(30)->recycle($artists)->create(); // recycle() efficiently assigns artists

        // You might want to call other specific seeders here if you create them
        // $this->call([
        //     UserSeeder::class,
        // ]);
    }
}
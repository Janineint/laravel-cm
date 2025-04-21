<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\View\View; // Import View

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource (Collection Page).
     */
    public function index(): View // Type hint the return type
    {
        // Eager load the artist relationship to avoid N+1 query problems
        $artworks = Artwork::with('artist')->latest()->paginate(9); // Get latest 9, paginated

        return view('artworks.index', compact('artworks')); // Pass data to the view
        // 'artworks.index' corresponds to resources/views/artworks/index.blade.php
    }

    /**
     * Display the specified resource (Single Artwork Page).
     */
    public function show(Artwork $artwork): View // Route-Model Binding
    {
        // Laravel automatically finds the Artwork by ID from the route parameter
        // Eager load the artist
        $artwork->load('artist');

        return view('artworks.show', compact('artwork'));
        // 'artworks.show' corresponds to resources/views/artworks/show.blade.php
    }

    /**
     * Show the Art of the Day page.
     */
     public function artOfTheDay(): View
     {
         // Get one random artwork, eager load artist
         $artwork = Artwork::with('artist')->inRandomOrder()->first();

         return view('artworks.artoftheday', compact('artwork'));
          // 'artworks.artoftheday' corresponds to resources/views/artworks/artoftheday.blade.php
     }

}
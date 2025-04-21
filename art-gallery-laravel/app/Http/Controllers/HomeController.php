<?php

namespace App\Http\Controllers;

use App\Models\Artwork; // Import the Artwork model
use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View facade/class

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * Fetches featured artworks to display on the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Fetch a limited number of artworks to feature.
        // You can change the criteria (e.g., latest, random, specific IDs).
        // Eager load the 'artist' relationship for efficiency.
        $featuredArtworks = Artwork::with('artist') // Eager load artist
                                    ->latest()      // Get the newest ones first
                                    ->take(9)       // Limit to 9 artworks (like original index.php)
                                    ->get();

        // Pass the fetched artworks to the home view
        return view('home', compact('featuredArtworks'));
        // Corresponds to resources/views/home.blade.php
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Artist; // Import Artist model for the filter dropdown
use Illuminate\Http\Request; // Import Request
use Illuminate\View\View;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource (Collection Page) with filtering.
     */
    public function index(Request $request): View // Inject Request
    {
        // Start the query, always eager load artist
        $query = Artwork::with('artist');

        // --- Apply Filters ---

        // Filter by Search Term (Title)
        if ($request->filled('search_title')) { // Check if search_title has a value
            $searchTerm = $request->input('search_title');
            // Add a WHERE clause to search the 'title' column
            $query->where('title', 'LIKE', '%' . $searchTerm . '%');
        }

        // Filter by Artist ID
        if ($request->filled('artist_id')) { // Check if artist_id has a value
            $artistId = $request->input('artist_id');
            // Add a WHERE clause for the 'artist_id' column
            $query->where('artist_id', $artistId);
        }

        // --- End Apply Filters ---

        // Order the results (e.g., latest first)
        $query->latest(); // Apply ordering *after* filters, *before* pagination

        // Paginate the *filtered and ordered* results
        // Use paginate(9) for 9 items per page, like before.
        // Use withQueryString() to append filter parameters to pagination links!
        $artworks = $query->paginate(9)->withQueryString();

        // Get all artists for the filter dropdown
        $artists = Artist::orderBy('preferred_display_name')->get();

        // Pass paginated artworks AND artists list to the view
        return view('artworks.index', compact('artworks', 'artists'));
        // 'artworks.index' corresponds to resources/views/artworks/index.blade.php
    }

    /**
     * Display the specified resource (Single Artwork Page).
     */
    public function show(Artwork $artwork): View
    {
        $artwork->load('artist');
        return view('artworks.show', compact('artwork'));
    }

    /**
     * Show the Art of the Day page.
     */
     public function artOfTheDay(): View
     {
         $artwork = Artwork::with('artist')->inRandomOrder()->first();
         return view('artworks.artoftheday', compact('artwork'));
     }
}
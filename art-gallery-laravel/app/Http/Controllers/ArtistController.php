<?php

namespace App\Http\Controllers;

use App\Models\Artist; // Import the Artist model
use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View facade/class

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource (Artists A-Z page).
     * Replicates the logic from the original php-cm-janines/pages/artist.php file.
     */
    public function index(): View
    {
        // Fetch all artists ordered alphabetically by display name
        $artists_query = Artist::orderBy('preferred_display_name', 'asc')->get(); // Fetches ordered artists

        $grouped_artists = [];

        if ($artists_query->count() > 0) {
            foreach ($artists_query as $artist) { // Loops through artists
                $name = $artist->preferred_display_name;
                // Determine the first letter, handle non-alpha characters
                $first_letter = strtoupper(substr($name, 0, 1));
                if (!ctype_alpha($first_letter)) {
                    $first_letter = '#';
                }
                // Group artists by the first letter
                $grouped_artists[$first_letter][] = $artist; // Store the whole Artist object
            }
            // Ensure the groups are sorted alphabetically ('#' usually comes last automatically)
            ksort($grouped_artists);
            // Move '#' group to the end if it exists and isn't the only group
            if (isset($grouped_artists['#']) && count($grouped_artists) > 1) {
                $hash_group = $grouped_artists['#'];
                unset($grouped_artists['#']);
                $grouped_artists['#'] = $hash_group;
            }
        }

        // Pass the grouped artists array to the view
        return view('artists.index', compact('grouped_artists'));
        // Corresponds to resources/views/artists/index.blade.php
    }

    /**
     * Display the specified resource (Single Artist page).
     *
     * @param  \App\Models\Artist  $artist Automatically resolved by Route Model Binding
     * @return \Illuminate\View\View
     */
    public function show(Artist $artist): View
    {
        // Laravel automatically finds the Artist by ID due to Route Model Binding.
        // We need to load the artworks related to this artist.
        $artist->load('artworks'); // Eager load the 'artworks' relationship defined in the Artist model

        // Pass the specific artist (with their artworks loaded) to the view
        return view('artists.show', compact('artist'));
        // Corresponds to resources/views/artists/show.blade.php
    }
}
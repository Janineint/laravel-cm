<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist; // Import Artist model
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminArtistController extends Controller
{
    /**
     * Display a listing of the artists.
     */
    public function index(): View
    {
        // Fetch artists, ordered by name or latest, and paginate
        $artists = Artist::orderBy('preferred_display_name')->paginate(15);

        return view('admin.artists.index', compact('artists'));
        // Corresponds to resources/views/admin/artists/index.blade.php
    }

    /**
     * Show the form for creating a new artist.
     */
    public function create(): View
    {
        return view('admin.artists.create');
        // Corresponds to resources/views/admin/artists/create.blade.php
    }

    /**
     * Store a newly created artist in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'preferred_display_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
            'birth_year' => 'nullable|integer|min:0|max:' . date('Y'), // Basic year validation
            'death_year' => 'nullable|integer|min:0|max:' . date('Y') . '|gte:birth_year', // Death year >= birth year
        ]);

        // Create the Artist using mass assignment (ensure fields are in $fillable in Artist model)
        Artist::create($validated);

        return redirect()->route('admin.artists.index')
                         ->with('success', 'Artist created successfully.');
    }

    /**
     * Display the specified artist (Optional - often redirect to edit).
     */
    public function show(Artist $artist): View
    {
        // Often redirect to edit for admin CRUD
        // return redirect()->route('admin.artists.edit', $artist);
        // Or create a show view if needed
         return view('admin.artists.show', compact('artist')); // If you create this view
    }

    /**
     * Show the form for editing the specified artist.
     */
    public function edit(Artist $artist): View
    {
        return view('admin.artists.edit', compact('artist'));
        // Corresponds to resources/views/admin/artists/edit.blade.php
    }

    /**
     * Update the specified artist in storage.
     */
    public function update(Request $request, Artist $artist): RedirectResponse
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'preferred_display_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
            'birth_year' => 'nullable|integer|min:0|max:' . date('Y'),
            'death_year' => 'nullable|integer|min:0|max:' . date('Y') . '|gte:birth_year',
        ]);

        // Update the artist instance
        $artist->update($validated);

        return redirect()->route('admin.artists.index')
                         ->with('success', 'Artist updated successfully.');
    }

    /**
     * Remove the specified artist from storage.
     */
    public function destroy(Artist $artist): RedirectResponse
    {
        // Optional: Add checks here if needed (e.g., check if artist has artworks before deleting)
        // if ($artist->artworks()->count() > 0) {
        //     return redirect()->route('admin.artists.index')
        //                      ->with('error', 'Cannot delete artist with associated artworks.');
        // }

        $artist->delete();

        return redirect()->route('admin.artists.index')
                         ->with('success', 'Artist deleted successfully.');
    }
}
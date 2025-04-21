<?php

namespace App\Http\Controllers\Admin; // Correct namespace

use App\Http\Controllers\Controller; // Base controller
use App\Models\Artwork;
use App\Models\Artist; // Need Artist model for create form dropdown
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; // For redirects

class AdminArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $artworks = Artwork::with('artist')->latest()->paginate(15); // Paginate admin list
        return view('admin.artworks.index', compact('artworks'));
         // Corresponds to resources/views/admin/artworks/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $artists = Artist::orderBy('preferred_display_name')->get(); // Get artists for dropdown
        return view('admin.artworks.create', compact('artists'));
         // Corresponds to resources/views/admin/artworks/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse // Inject Request, return RedirectResponse
    {
        // 1. Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url|max:1024',
            'artist_id' => 'required|exists:artists,id', // Ensure artist exists
             // Add validation for other fields
        ]);

        // 2. Create the Artwork using mass assignment
        Artwork::create($validated);

        // 3. Redirect back to the index page with a success message
        return redirect()->route('admin.artworks.index')
                         ->with('success', 'Artwork created successfully.'); // Flash message
    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork): View
    {
         // Typically not needed for basic admin CRUD, often redirect to edit
         return view('admin.artworks.show', compact('artwork')); // If you create this view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork): View
    {
        $artists = Artist::orderBy('preferred_display_name')->get();
        return view('admin.artworks.edit', compact('artwork', 'artists'));
         // Corresponds to resources/views/admin/artworks/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url|max:1024',
            'artist_id' => 'required|exists:artists,id',
             // Add validation for other fields
        ]);

        // Update the artwork instance
        $artwork->update($validated);

        return redirect()->route('admin.artworks.index')
                         ->with('success', 'Artwork updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork): RedirectResponse
    {
        $artwork->delete();

        return redirect()->route('admin.artworks.index')
                         ->with('success', 'Artwork deleted successfully.');
    }
}
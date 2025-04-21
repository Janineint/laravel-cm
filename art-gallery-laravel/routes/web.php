<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminArtworkController;
use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\Admin\UserController;

// --- Public Routes ---

// Homepage (adjust if you have a dedicated home controller/method)
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [ArtworkController::class, 'index'])->name('home'); // Example: Make collection the homepage

// Static Pages
Route::get('/about', [PageController::class, 'about'])->name('about');

// Artwork Routes
Route::get('/collection', [ArtworkController::class, 'index'])->name('artworks.index');
Route::get('/collection/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show'); // Use Route Model Binding
Route::get('/art-of-the-day', [ArtworkController::class, 'artOfTheDay'])->name('artworks.artoftheday');

// Artist Routes
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show'); // Use Route Model Binding


// --- Breeze Auth Routes (Added by breeze:install) ---
Route::get('/dashboard', function () {
    // Redirect logged-in users based on role or to a default dashboard
    if (auth()->user()->isAdmin() || auth()->user()->isArtist()) {
         return redirect()->route('admin.dashboard');
    }
     return view('dashboard'); // Default Breeze dashboard for regular users if any
})->middleware(['auth', 'verified'])->name('dashboard');


// --- Admin Routes ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin CRUD Resources (Ensure middleware checks for appropriate role if needed)
    Route::resource('artworks', AdminArtworkController::class);
    Route::resource('artists', AdminArtistController::class);
    Route::resource('users', UserController::class); // Add middleware for admin-only access here if needed

    // Breeze Profile Routes (can be kept within admin or moved outside)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Include the routes defined by Breeze
require __DIR__.'/auth.php';
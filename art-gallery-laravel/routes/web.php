<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminArtworkController;
use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// --- Public Routes ---

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/collection', [ArtworkController::class, 'index'])->name('artworks.index');
Route::get('/collection/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');
Route::get('/art-of-the-day', [ArtworkController::class, 'artOfTheDay'])->name('artworks.artoftheday');
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');


// --- Default Breeze Dashboard Route ---
Route::get('/dashboard', function () {
    // Use Auth facade here
    if (Auth::check()) { // <-- Changed from auth()->check()
        $user = Auth::user(); // <-- Changed from auth()->user()
        // Check if isAdmin() and isArtist() methods exist on the User model
        if (method_exists($user, 'isAdmin') && $user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        if (method_exists($user, 'isArtist') && $user->isArtist()) {
             return redirect()->route('admin.dashboard');
        }
    }
    // Default view for authenticated users without specific roles
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// --- Admin Routes ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('artworks', AdminArtworkController::class);
    Route::resource('artists', AdminArtistController::class);
    Route::resource('users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// --- Authentication Routes ---
require __DIR__.'/auth.php';
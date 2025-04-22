<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Import User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import Hash facade for passwords
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules; // For password validation rules

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(): View
    {
        // Fetch all users, maybe paginate
        $users = User::latest()->paginate(10); // Example: Paginate 10 users per page

        return view('admin.users.index', compact('users'));
        // Corresponds to resources/views/admin/users/index.blade.php
    }

    /**
     * Show the form for creating a new user.
     */
    public function create(): View
    {
        return view('admin.users.create');
        // Corresponds to resources/views/admin/users/create.blade.php
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class], // Ensure email is unique in users table
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Use default strong password rules, requires password_confirmation field
            'role' => ['required', 'string', 'in:admin,artist,user'], // Validate role against allowed values
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash the password!
            'role' => $validated['role'],
            'email_verified_at' => now(), // Optional: Mark as verified immediately
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user (Optional - often redirect to edit).
     */
    public function show(User $user): View
    {
        // Typically you might just redirect to the edit page for admin CRUD
        // return redirect()->route('admin.users.edit', $user);
        // Or create a show view if needed:
         return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
         // Corresponds to resources/views/admin/users/edit.blade.php
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
         // Validate the request data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Ensure email is unique, ignoring the current user's email
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            // Password is optional on update
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:admin,artist,user'],
        ]);

        // Prepare data for update
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];

        // Only update password if a new one was provided
        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        // Update the user model
        $user->update($updateData);

        return redirect()->route('admin.users.index')
                         ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // Basic protection: prevent deleting the currently logged-in user
        if (Auth::id() === $user->id) {
             return redirect()->route('admin.users.index')
                              ->with('error', 'You cannot delete your own account.');
        }

        // Add more checks if needed (e.g., prevent deleting the last admin)

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User deleted successfully.');
    }
}
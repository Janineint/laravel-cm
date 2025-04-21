@extends('layouts.admin') {{-- Use the admin layout --}}

 @section('title', 'Admin Dashboard')

 @section('content')
 <div class="py-4">
     <h1>Admin Dashboard</h1>

     {{-- Display user role and welcome message --}}
     @auth
         <p>Welcome, {{ auth()->user()->name }}. Your role is: {{ auth()->user()->role }}</p>
     @endauth

     {{-- Conditional dashboard links based on role --}}
     <div class="list-group">
         @auth
             @if (auth()->user()->isAdmin())
                 <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">
                     <i class="fas fa-users me-2"></i> Manage Users
                 </a>
                  <a href="{{ route('admin.artists.index') }}" class="list-group-item list-group-item-action">
                     <i class="fas fa-paint-brush me-2"></i> Manage Artists
                 </a>
                  <a href="{{ route('admin.artworks.index') }}" class="list-group-item list-group-item-action">
                     <i class="fas fa-image me-2"></i> Manage Artworks
                 </a>
             @elseif (auth()->user()->isArtist())
                 <a href="{{ route('admin.artworks.index') }}" class="list-group-item list-group-item-action">
                      <i class="fas fa-image me-2"></i> Manage My Artworks
                 </a>
             @endif
             {{-- Common links --}}
              <a href="{{ route('admin.profile.edit') }}" class="list-group-item list-group-item-action">
                  <i class="fas fa-user-cog me-2"></i> Edit Profile
             </a>
              <form method="POST" action="{{ route('logout') }}" class="d-inline">
                 @csrf
                 <button type="submit" class="list-group-item list-group-item-action text-danger">
                     <i class="fas fa-sign-out-alt me-2"></i> Logout
                 </button>
             </form>

         @endauth
     </div>

 </div>
 @endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin - @yield('title')</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- Include Admin Navigation - Adapt Breeze's navigation or create your own --}}
            {{-- @include('layouts.admin-navigation') --}}
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                 <div class="container">
                     <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="adminNavbar">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                             <li class="nav-item">
                                 <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                             </li>
                             {{-- Show links based on role --}}
                             @auth
                                 @if(auth()->user()->isAdmin())
                                     <li class="nav-item">
                                         <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Manage Users</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link {{ request()->routeIs('admin.artists.*') ? 'active' : '' }}" href="{{ route('admin.artists.index') }}">Manage Artists</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link {{ request()->routeIs('admin.artworks.*') ? 'active' : '' }}" href="{{ route('admin.artworks.index') }}">Manage Artworks</a>
                                     </li>
                                 @elseif(auth()->user()->isArtist())
                                      <li class="nav-item">
                                         <a class="nav-link {{ request()->routeIs('admin.artworks.*') ? 'active' : '' }}" href="{{ route('admin.artworks.index') }}">Manage My Artworks</a>
                                     </li>
                                 @endif
                             @endauth
                         </ul>
                         <ul class="navbar-nav ms-auto">
                             @auth
                                 <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         {{ Auth::user()->name }} ({{ Auth::user()->role }})
                                     </a>
                                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                         <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a></li>
                                         <li><hr class="dropdown-divider"></li>
                                         <li>
                                             <form method="POST" action="{{ route('logout') }}">
                                                 @csrf
                                                 <button type="submit" class="dropdown-item">Log Out</button>
                                             </form>
                                         </li>
                                     </ul>
                                 </li>
                             @endauth
                         </ul>
                     </div>
                 </div>
             </nav>


            @hasSection('header')
                <header class="bg-white shadow">
                    <div class="container py-3">
                        @yield('header')
                    </div>
                </header>
            @endif

            <main class="admin-content">
                @yield('content')
            </main>
        </div>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
         @stack('scripts')
    </body>
</html>
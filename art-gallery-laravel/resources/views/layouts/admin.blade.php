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

        <style>
             /* Paste relevant styles from php-cm-janines/admin/styles.css or admin/includes/styles.css here */
             /* Or include a separate admin CSS file via Vite/Mix */
             body { background-color: #f8f9fa; }
             .admin-content { max-width: 1200px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
             table { width: 100%; border: 1px solid #ccc; border-spacing: 0; border-collapse: collapse; margin-bottom: 1rem; }
             td img, th img { margin: 0; padding: 0; vertical-align: middle; }
             td, th { border: 1px solid #ccc; padding: 10px; vertical-align: middle; }
             th { white-space: nowrap; background-color: #e9ecef; }
             label { display: block; margin-bottom: 5px; font-weight: 500; }
             input[type=text], input[type=email], input[type=password], input[type=url], input[type=date], textarea, select {
                 display: block; width: 100%; padding: .375rem .75rem; font-size: 1rem; font-weight: 400; line-height: 1.5; color: #212529; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; appearance: none; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; margin-bottom: 1rem;
             }
             input[type=submit], .btn { display: inline-block; font-weight: 400; line-height: 1.5; color: #fff; text-align: center; text-decoration: none; vertical-align: middle; cursor: pointer; user-select: none; background-color: #0d6efd; border: 1px solid #0d6efd; padding: .375rem .75rem; font-size: 1rem; border-radius: .25rem; transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out; }
             .btn-primary { background-color: #0d6efd; border-color: #0d6efd; }
             .btn-secondary { background-color: #6c757d; border-color: #6c757d; }
             .btn-danger { background-color: #dc3545; border-color: #dc3545; }
             .alert { padding: 1rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; }
             .alert-success { color: #0f5132; background-color: #d1e7dd; border-color: #badbcc; }
             .alert-danger { color: #842029; background-color: #f8d7da; border-color: #f5c2c7; }
             .text-end { text-align: right; }
        </style>
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
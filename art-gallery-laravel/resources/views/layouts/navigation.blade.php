<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Art Explorer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                     {{-- Use request()->routeIs() to set active state --}}
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('artworks.artoftheday') ? 'active' : '' }}" href="{{ route('artworks.artoftheday') }}">Art of the Day</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('artworks.index') ? 'active' : '' }}" href="{{ route('artworks.index') }}">Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('artists.index') ? 'active' : '' }}" href="{{ route('artists.index') }}">Artists</a>
                </li>
                <li class="nav-item ms-lg-3">
                    @auth {{-- Check if user is logged in --}}
                         {{-- Determine dashboard link based on role --}}
                         @if(auth()->user()->isAdmin() || auth()->user()->isArtist())
                            <a class="btn btn-outline-light" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                         @else
                             <a class="btn btn-outline-light" href="{{ route('dashboard') }}">My Dashboard</a> {{-- Default Breeze dashboard --}}
                         @endif
                    @else {{-- If user is a guest --}}
                        <a class="btn btn-outline-light" href="{{ route('login') }}">Login</a>
                         {{-- Optional: Show register link --}}
                         {{-- @if (Route::has('register'))
                             <a class="btn btn-outline-primary ms-2" href="{{ route('register') }}">Register</a>
                         @endif --}}
                    @endauth
                </li>
                @auth
                 {{-- Add logout button if needed directly in public nav --}}
                 <li class="nav-item ms-lg-3">
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <button type="submit" class="btn btn-outline-danger">Logout</button>
                     </form>
                 </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
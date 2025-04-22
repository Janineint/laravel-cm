@extends('layouts.app') {{-- Use the main layout --}}

@section('title', 'Collection') {{-- Set the page title --}}

@section('content')
<main class="container py-5 mt-5 content-section">
    <h1 class="mb-4 text-center">Explore the Collection</h1>

    <div class="filter-form mb-5 p-4 bg-light rounded shadow-sm">
        <form action="{{ route('artworks.index') }}" method="GET" class="row g-3 align-items-center">
            {{-- No CSRF needed for GET requests --}}
            <div class="col-md-5">
                <label for="search_title" class="visually-hidden">Search by Title</label>
                <input type="text" class="form-control" id="search_title" name="search_title" placeholder="Search by title..." value="{{ request('search_title') }}">
                {{-- value attribute uses request() helper to get current filter value --}}
            </div>

            <div class="col-md-5">
                <label for="artist_id" class="visually-hidden">Filter by Artist</label>
                <select class="form-select" id="artist_id" name="artist_id">
                    <option value="">All Artists</option>
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}" {{ request('artist_id') == $artist->id ? 'selected' : '' }}>
                            {{ $artist->preferred_display_name }}
                        </option>
                         {{-- ternary operator checks if current artist matches request filter value --}}
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 text-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>
    </div>
    <div class="row g-4">
        @forelse ($artworks as $art) {{-- Loop through filtered & paginated artworks --}}
            <div class="col-md-4">
                <div class="card h-100 project-card"> {{-- Added project-card class --}}
                    <div class="project-image-container">
                         @if ($art->image_url)
                             <img src="{{ $art->image_url }}" class="card-img-top" alt="{{ $art->title }}">
                         @else
                             <div class="bg-light p-5 text-muted text-center d-flex align-items-center justify-content-center h-100">No image</div>
                         @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $art->title }}</h5>
                        {{-- Access related artist name safely --}}
                        <p class="text-muted small mb-2">{{ $art->artist->preferred_display_name ?? 'Unknown Artist' }}</p>
                        <a href="{{ route('artworks.show', $art->id) }}" class="btn btn-sm btn-outline-primary mt-auto">View Details</a>
                         {{-- mt-auto pushes button to bottom --}}
                    </div>
                </div>
            </div>
        @empty {{-- If $artworks (filtered collection) is empty --}}
            <div class="col-12 text-center">
                <div class="alert alert-info">No artworks match your filters.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{-- This automatically includes filter parameters because of withQueryString() in controller --}}
        {{ $artworks->links() }}
    </div>

</main>
@endsection

{{-- Optional: Add specific styles for filter form if needed --}}
@push('styles')
<style>
    .filter-form label {
        font-weight: 500;
    }
</style>
@endpush
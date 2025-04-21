@extends('layouts.app') {{-- Use the main layout --}}

@section('title', 'Collection') {{-- Set the page title --}}

@section('content')
<main class="container py-5 mt-5 content-section">
    <h1 class="mb-4 text-center">Explore the Collection</h1>

    {{-- Add your filter form here, using old() helper for sticky values --}}
    {{-- Example: <input type="text" name="search" value="{{ old('search', request('search')) }}"> --}}

    <div class="row g-4">
        @forelse ($artworks as $art) {{-- Loop through artworks passed from controller --}}
            <div class="col-md-4">
                <div class="card h-100">
                    @if ($art->image_url)
                        <img src="{{ $art->image_url }}" class="card-img-top" alt="{{ $art->title }}">
                    @else
                        <div class="bg-light p-5 text-muted text-center">No image</div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $art->title }}</h5>
                        {{-- Access related artist name safely --}}
                        <p class="text-muted small">{{ $art->artist->preferred_display_name ?? 'Unknown Artist' }}</p>
                        <a href="{{ route('artworks.show', $art->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                    </div>
                </div>
            </div>
        @empty {{-- If $artworks is empty --}}
            <div class="col-12 text-center">
                <div class="alert alert-info">No artworks match your filters.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-5">
        {{ $artworks->links() }} {{-- Render pagination links --}}
    </div>

</main>
@endsection
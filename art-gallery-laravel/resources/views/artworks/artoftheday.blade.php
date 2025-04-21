@extends('layouts.app')

@section('title', 'Art of the Day')

@section('content')
<main class="container py-5 mt-5 content-section">
    <h1 class="mb-4 text-center">🎨 Art of the Day</h1>

    @if ($artwork)
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                @if ($artwork->image_url)
                    <a href="{{ route('artworks.show', $artwork) }}"> {{-- Link image to detail page --}}
                         <img src="{{ $artwork->image_url }}" alt="{{ $artwork->title }}" class="img-fluid rounded shadow">
                    </a>
                @else
                    <div class="bg-light text-muted text-center p-5 rounded">No image available</div>
                @endif
            </div>
            <div class="col-md-6">
                <h2>
                     <a href="{{ route('artworks.show', $artwork) }}" class="text-decoration-none text-dark">
                         {{ $artwork->title }}
                     </a>
                </h2>
                <p class="text-muted">By {{ $artwork->artist->preferred_display_name ?? 'Unknown Artist' }}</p>
                @if ($artwork->description)
                     {{-- Display a snippet or full description --}}
                    <p>{{ Str::limit(nl2br(e($artwork->description)), 200) }}</p> {{-- Example: Limit description --}}
                     <a href="{{ route('artworks.show', $artwork) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                @else
                    <p class="text-muted fst-italic">No description available for this piece.</p>
                @endif
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center">No artwork found to feature today.</div>
    @endif
</main>
@endsection
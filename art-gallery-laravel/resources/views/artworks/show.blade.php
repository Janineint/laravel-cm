@extends('layouts.app')

@section('title', $artwork->title)

@section('content')
<main class="container py-5 mt-5 content-section">
    @if ($artwork)
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                @if ($artwork->image_url)
                    <img src="{{ $artwork->image_url }}" alt="{{ $artwork->title }}" class="img-fluid rounded shadow-sm">
                @else
                    <div class="bg-light text-muted text-center p-5 rounded">No image available</div>
                @endif
            </div>
            <div class="col-md-6">
                <h1>{{ $artwork->title }}</h1>
                <p class="text-muted lead">By <a href="{{ route('artists.show', $artwork->artist_id) }}">{{ $artwork->artist->preferred_display_name ?? 'Unknown Artist' }}</a></p>
                @if ($artwork->description)
                    <p>{!! nl2br(e($artwork->description)) !!}</p> {{-- Use nl2br for line breaks, e() for escaping --}}
                @else
                    <p class="text-muted fst-italic">No description available for this piece.</p>
                @endif

                {{-- Add other details if available in your model --}}
                {{-- <p><strong>Medium:</strong> {{ $artwork->medium ?? 'N/A' }}</p> --}}
                {{-- <p><strong>Dimensions:</strong> {{ $artwork->dimensions ?? 'N/A' }}</p> --}}
                {{-- <p><strong>Created:</strong> {{ $artwork->creation_year ?? 'N/A' }}</p> --}}

                <a href="{{ route('artworks.index') }}" class="btn btn-outline-secondary mt-3"><i class="fas fa-arrow-left"></i> Back to Collection</a>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center">Artwork not found.</div>
        <div class="text-center">
             <a href="{{ route('artworks.index') }}" class="btn btn-primary">Go to Collection</a>
        </div>
    @endif
</main>
@endsection
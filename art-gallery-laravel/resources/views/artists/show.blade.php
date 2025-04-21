@extends('layouts.app')

@section('title', $artist->preferred_display_name)

@section('content')
<main class="container py-5 mt-5 content-section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-3">{{ $artist->preferred_display_name }}</h1>
            <p class="text-muted">
                {{ $artist->nationality ?? 'Unknown Nationality' }}
                @if($artist->birth_year || $artist->death_year)
                    ({{ $artist->birth_year ?? '?' }} - {{ $artist->death_year ?? '?' }})
                @endif
            </p>

            @if($artist->bio)
                <div class="artist-bio mb-4">
                    <p>{!! nl2br(e($artist->bio)) !!}</p>
                </div>
            @endif

            <h3 class="mt-5 mb-3">Artworks by this Artist</h3>
             {{-- Check if artworks relationship is loaded --}}
             @if ($artist->artworks && $artist->artworks->count() > 0)
                <div class="row g-4">
                    @foreach ($artist->artworks as $artwork)
                        <div class="col-md-4">
                            <div class="card h-100">
                                @if ($artwork->image_url)
                                    <a href="{{ route('artworks.show', $artwork) }}">
                                         <img src="{{ $artwork->image_url }}" class="card-img-top" alt="{{ $artwork->title }}">
                                    </a>
                                @else
                                    <div class="bg-light p-5 text-muted text-center">No image</div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <a href="{{ route('artworks.show', $artwork) }}" class="text-decoration-none text-dark">
                                             {{ $artwork->title }}
                                         </a>
                                    </h5>
                                    {{-- Add other info if needed --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
             @else
                  <p class="text-muted fst-italic">No artworks found for this artist in the collection.</p>
             @endif

             <div class="mt-4">
                 <a href="{{ route('artists.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back to Artists List</a>
             </div>
        </div>
    </div>
</main>
@endsection
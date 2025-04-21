@extends('layouts.app')

 @section('title', 'Artists A-Z')

 @section('content')
 <main class="container py-5 mt-5 content-section">
     <h1 class="mb-4 text-center">Artists A–Z</h1>

     {{-- Alphabet Filter (Assuming $grouped_artists is passed from controller) --}}
     @if (!empty($grouped_artists))
         <div class="mb-4 text-center filter-buttons">
             @foreach (range('A', 'Z') as $letter)
                 @if (isset($grouped_artists[$letter]))
                     <a href="#artist-{{ $letter }}" class="btn btn-outline-primary btn-sm m-1">{{ $letter }}</a>
                 @else
                     <span class="btn btn-outline-secondary btn-sm m-1 disabled">{{ $letter }}</span>
                 @endif
             @endforeach
             @if (isset($grouped_artists['#']))
                 <a href="#artist-other" class="btn btn-outline-primary btn-sm m-1">#</a>
             @else
                 <span class="btn btn-outline-secondary btn-sm m-1 disabled">#</span>
             @endif
         </div>

         @foreach ($grouped_artists as $letter => $artists)
             <div class="artist-group mb-4">
                 <h4 id="artist-{{ $letter === '#' ? 'other' : $letter }}" class="mt-4 border-bottom pb-2">{{ $letter }}</h4>
                 <ul class="list-unstyled row">
                     @foreach ($artists as $artist)
                         <li class="col-md-4 col-sm-6 my-1">
                             <a href="{{ route('artists.show', $artist->id) }}">
                                 {{ $artist->preferred_display_name }}
                             </a>
                         </li>
                     @endforeach
                 </ul>
             </div>
         @endforeach
     @else
          <div class="alert alert-info">No artists found.</div>
     @endif
 </main>

 @push('styles')
 <style>
     .filter-buttons a, .filter-buttons span { min-width: 35px; }
     .artist-group ul { column-count: 3; } /* Simple column layout */
      @media (max-width: 768px) { .artist-group ul { column-count: 2; } }
      @media (max-width: 576px) { .artist-group ul { column-count: 1; } }
 </style>
 @endpush

 @endsection
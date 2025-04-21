@extends('layouts.admin')

@section('title', 'Edit Artwork: ' . $artwork->title)

@section('content')
<div class="container py-4">
    <h2>Edit Artwork: {{ $artwork->title }}</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.artworks.update', $artwork) }}" method="POST">
        @csrf {{-- CSRF Protection --}}
        @method('PUT') {{-- Method spoofing for UPDATE --}}

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $artwork->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="artist_id" class="form-label">Artist:</label>
            <select name="artist_id" id="artist_id" class="form-select" required>
                <option value="">Select an Artist</option>
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}" {{ old('artist_id', $artwork->artist_id) == $artist->id ? 'selected' : '' }}>
                        {{ $artist->preferred_display_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $artwork->description) }}</textarea>
            {{-- Optional: Add CKEditor here if needed --}}
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL:</label>
            <input type="url" name="image_url" id="image_url" class="form-control" value="{{ old('image_url', $artwork->image_url) }}">
            {{-- Consider adding file upload functionality later --}}
        </div>

        {{-- Add other fields as needed --}}

         @if ($artwork->image_url)
         <div class="mb-3">
              <label>Current Image:</label>
              <div>
                   <img src="{{ $artwork->image_url }}" alt="Current Image" style="max-width: 200px; height: auto;">
              </div>
         </div>
         @endif


        <button type="submit" class="btn btn-primary">Update Artwork</button>
        <a href="{{ route('admin.artworks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

 {{-- Add script for CKEditor if used --}}
 {{-- @push('scripts') ... @endpush --}}
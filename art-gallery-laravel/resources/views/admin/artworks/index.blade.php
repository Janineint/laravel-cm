@extends('layouts.admin') {{-- Use admin layout --}}

@section('title', 'Manage Artworks')

@section('content')
<div class="container py-4">
    <h2>Manage Artworks</h2>

    @if (session('success')) {{-- Display flash messages --}}
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3 text-end">
         <a href="{{ route('admin.artworks.create') }}" class="btn btn-primary">
             <i class="fas fa-plus-square"></i> Add Artwork
         </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($artworks as $artwork)
            <tr>
                <td>
                     @if ($artwork->image_url)
                         <img src="{{ $artwork->image_url }}" width="50" alt="{{ $artwork->title }}">
                     @else
                         (No Image)
                     @endif
                </td>
                <td>{{ $artwork->id }}</td>
                <td>{{ $artwork->title }}</td>
                <td>{{ $artwork->artist->preferred_display_name ?? 'N/A' }}</td>
                <td>{{ $artwork->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.artworks.edit', $artwork) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('admin.artworks.destroy', $artwork) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    {{-- Add Photo link if needed --}}
                    {{-- <a href="{{ route('admin.artworks.photo', $artwork) }}" class="btn btn-sm btn-info">Photo</a> --}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No artworks found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

     <div class="d-flex justify-content-center">
         {{ $artworks->links() }} {{-- Pagination for admin --}}
     </div>
</div>
@endsection
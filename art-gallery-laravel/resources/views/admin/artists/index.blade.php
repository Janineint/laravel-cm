@extends('layouts.admin') {{-- Use admin layout --}}

@section('title', 'Manage Artists')

@section('content')
<div class="container py-4">
    <h2>Manage Artists</h2>

    {{-- Display Success/Error Messages --}}
    @include('includes.alert') {{-- Assuming you create a partial for alerts --}}
    {{-- Or directly: --}}
    {{-- @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif --}}
    {{-- @if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif --}}


    <div class="mb-3 text-end">
         <a href="{{ route('admin.artists.create') }}" class="btn btn-primary">
             <i class="fas fa-plus-square"></i> Add New Artist
         </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Display Name</th>
                <th>Nationality</th>
                <th>Birth Year</th>
                <th>Death Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($artists as $artist)
            <tr>
                <td>{{ $artist->id }}</td>
                <td>{{ $artist->preferred_display_name }}</td>
                <td>{{ $artist->nationality ?? 'N/A' }}</td>
                <td>{{ $artist->birth_year ?? 'N/A' }}</td>
                <td>{{ $artist->death_year ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.artists.edit', $artist) }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.artists.destroy', $artist) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this artist?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No artists found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

     <div class="d-flex justify-content-center">
         {{ $artists->links() }} {{-- Pagination for artists --}}
     </div>
</div>
@endsection
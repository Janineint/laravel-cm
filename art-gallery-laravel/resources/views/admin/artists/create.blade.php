@extends('layouts.admin')

@section('title', 'Add New Artist')

@section('content')
<div class="container py-4">
    <h2>Add New Artist</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.artists.store') }}" method="POST">
        @csrf {{-- CSRF Protection --}}

        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="preferred_display_name" class="form-label">Preferred Display Name:</label>
                <input type="text" name="preferred_display_name" id="preferred_display_name" class="form-control" value="{{ old('preferred_display_name') }}" required>
            </div>

            <div class="col-md-12 mb-3">
                <label for="bio" class="form-label">Biography:</label>
                <textarea name="bio" id="bio" rows="5" class="form-control">{{ old('bio') }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label for="nationality" class="form-label">Nationality:</label>
                <input type="text" name="nationality" id="nationality" class="form-control" value="{{ old('nationality') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="birth_year" class="form-label">Birth Year:</label>
                <input type="number" name="birth_year" id="birth_year" class="form-control" value="{{ old('birth_year') }}" placeholder="YYYY">
            </div>

            <div class="col-md-4 mb-3">
                <label for="death_year" class="form-label">Death Year (Optional):</label>
                <input type="number" name="death_year" id="death_year" class="form-control" value="{{ old('death_year') }}" placeholder="YYYY">
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Add Artist</button>
            <a href="{{ route('admin.artists.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Edit User: ' . $user->name)

@section('content')
<div class="container py-4">
    <h2>Edit User: {{ $user->name }}</h2>

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

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf {{-- CSRF Protection --}}
        @method('PUT') {{-- Method spoofing for UPDATE --}}

         <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

             <div class="col-md-6 mb-3">
                <label for="password" class="form-label">New Password (Optional):</label>
                <input type="password" name="password" id="password" class="form-control">
                <small class="form-text text-muted">Leave blank to keep current password.</small>
            </div>

             <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="role" class="form-label">Role:</label>
                 {{-- Prevent changing own role if desired, or changing the last admin's role --}}
                <select name="role" id="role" class="form-select" required {{ Auth::id() === $user->id ? 'disabled' : '' }}>
                    <option value="">Select Role</option>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    <option value="artist" {{ old('role', $user->role) == 'artist' ? 'selected' : '' }}>Artist</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @if(Auth::id() === $user->id)
                 <small class="form-text text-muted">You cannot change your own role.</small>
                 {{-- Need hidden input if disabled to pass value --}}
                 <input type="hidden" name="role" value="{{ $user->role }}" />
                @endif
            </div>
        </div>


        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
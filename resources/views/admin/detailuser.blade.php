@extends('admin.layout.index')
@section('content')
    <h1>Edit User</h1>
    <form action="{{ route('admin.user.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" value="{{ $user->username }}" name="username" required>
            </div>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" value="{{ $user->phone }}" name="phone" required>
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" aria-label="" name="role">
                <option value="admin" {{$user->role =='admin' ? 'selected' : ''}}>Admin</option>
                <option value="customer" {{$user->role =='customer' ? 'selected' : ''}}>Customer</option>
            </select>
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Image</label><br>
            @if ($user->img_path)
                <div class="text-center">
                    <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}" height="150px">
                </div>
            @else
                No Image
            @endif
            <input type="file" name="img_path" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary d-flex ms-auto">Update</button>
    </form>
@endsection

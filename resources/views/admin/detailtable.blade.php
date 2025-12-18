@extends('admin.layout.index')
@section('content')
    <h1>Edit Table</h1>
    @error('table_number')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    @error('capacity')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <form action="{{ route('admin.table.update', $table) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="table_number" class="form-label fw-bold">Table Number</label>
            <input type="text" name="table_number" class="form-control" value="{{ $table->table_number }}" required>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label fw-bold">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $table->capacity }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary d-flex ms-auto">Update</button>
    </form>
@endsection

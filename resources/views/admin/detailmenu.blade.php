@extends('admin.layout.index')
@section('content')
    <h1>Edit Menu</h1>
    <form action="{{ route('admin.menu.update', $menu) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $menu->name }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label fw-bold">Category</label>
            <select class="form-select" aria-label="" name="category">
                <option value="Appetizer" {{$menu->category =='Appetizer' ? 'selected' : ''}}>Appetizer</option>
                <option value="Main Dish" {{$menu->category =='Main Dish' ? 'selected' : ''}}>Main Dish</option>
                <option value="Dessert" {{$menu->category =='Dessert' ? 'selected' : ''}}>Dessert</option>
                <option value="Beverages" {{$menu->category =='Beverages' ? 'selected' : ''}}>Beverages</option>
                <option value="Additional" {{$menu->category =='Additional' ? 'selected' : ''}}>Additional</option>
            </select>
            @error('category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control" required>{{ $menu->description }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label fw-bold">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{$menu->price}}" required> 
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label fw-bold">Calories</label>
            <input type="number" class="form-control" id="calories" name="calories" value="{{$menu->calories}}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Image</label><br>
            @if ($menu->img_path)
                <img src="{{ Storage::disk('public')->exists($menu->img_path) ? asset('storage/'. $menu->img_path) : asset($menu->img_path) }}" alt="{{ $menu->name }}" height="150px">
            @else
                No Image
            @endif
            <input type="file" name="img_path" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary d-flex ms-auto">Update</button>
    </form>
@endsection

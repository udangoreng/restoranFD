@extends('admin.layout.index')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h1 class="mb-4">Menu Management</h1>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMenuModal">Add Menu</button>
        </div>

        <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="addMenuModalLabel">Add New Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.menu.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <select class="form-select" aria-label="" name="category">
                                    <option value="Appetizer" selected>Appetizer</option>
                                    <option value="Main Dish">Main Dish</option>
                                    <option value="Dessert">Dessert</option>
                                    <option value="Beverages">Beverages</option>
                                    <option value="Additional">Additional</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Calories</label>
                                <input type="number" class="form-control" id="price" name="calories" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="img_path">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ Str::limit($menu->description, 50) }}</td>
                        <td>{{ $menu->price }}</td>
                        <td>
                            @if ($menu->img_path)
                                <img src="{{ asset('storage/' . $menu->img_path) }}" alt="{{ $menu->name }}"
                                    width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.menu.detail', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">Delete</button>
                            <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Menu</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex flex-column align-items-center">
                                                <svg width="75" height="75" viewBox="0 0 31 31" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.5 0C6.95313 0 0 6.95313 0 15.5C0 24.0469 6.95313 31 15.5 31C24.0469 31 31 24.0469 31 15.5C31 6.95312 24.0469 0 15.5 0ZM15.5 28C8.60742 28 3 22.3926 3 15.5C3 8.60742 8.60742 3 15.5 3C22.3926 3 28 8.60742 28 15.5C28 22.3926 22.3926 28 15.5 28Z"
                                                        fill="#DC3545" />
                                                    <path
                                                        d="M15 6C14.1714 6 13.5 6.67188 13.5 7.5V17.0361C13.5 17.8643 14.1714 18.5361 15 18.5361C15.8286 18.5361 16.5 17.8643 16.5 17.0361V7.5C16.5 6.67188 15.8286 6 15 6ZM15 19.9111C14.1714 19.9111 13.5 20.583 13.5 21.4111V22.5C13.5 23.3281 14.1714 24 15 24C15.8286 24 16.5 23.3281 16.5 22.5V21.4111C16.5 20.583 15.8286 19.9111 15 19.9111Z"
                                                        fill="#DC3545" />
                                                </svg>
                                                <h4 class="mt-3">Are You Sure to Delete Menu?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/2.3.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable');
        });
    </script>
@endsection

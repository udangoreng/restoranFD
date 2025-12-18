@extends('admin.layout.index')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h1 class="mb-4">Table Management</h1>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMenuModal">Add Table</button>
        </div>

        @error('table_number')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
        @error('capacity')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror

        <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="addMenuModalLabel">Add New Table</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.table.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="table_number" class="form-label">Table Number</label>
                                <input type="text" class="form-control" id="table_number" name="table_number" required>
                            </div>
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control" id="capacity" name="capacity" required>
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
                    <th>Number</th>
                    <th>Capacity</th>
                    <th>Occupancy</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $table->table_number }}</td>
                        <td>{{ $table->capacity }}</td>
                        <td>{{ $table->is_occupied == 1 ? 'Occupied' : 'Avaiable' }}</td>
                        <td>
                            <a href="{{ route('admin.table.detail', $table->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">Delete</button>
                            <form action="{{ route('admin.table.destroy', $table->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Table</h1>
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
                                                <h4 class="mt-3">Are You Sure to Delete This Table?</h4>
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

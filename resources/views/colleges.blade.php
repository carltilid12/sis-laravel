@extends('template')

@section('title')
    Colleges
@endsection

@section('content')
    <div class="container mt-5">
        <h1>List of Colleges</h1>
        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCollegeModal">Add College</a>

        <!-- Add College Modal -->
        <div class="modal fade" id="addCollegeModal" tabindex="-1" aria-labelledby="addCollegeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addCollegeModalLabel">Add College</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- Add College Form -->
                <form action="{{ route('colleges.add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="collegeCode" class="form-label">College Code</label>
                    <input type="text" class="form-control" id="col_code" name="col_code" required>
                    </div>
                    <div class="mb-3">
                    <label for="collegeName" class="form-label">College Name</label>
                    <input type="text" class="form-control" id="col_name" name="col_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>College Code</th>
                    <th>College Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                <tr>
                    <td>{{ $college->col_id }}</td>
                    <td>{{ $college->col_code }}</td>
                    <td>{{ $college->col_name }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
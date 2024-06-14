@extends('template')

@section('title')
    Colleges
@endsection

@section('content')
    <div class="container mt-5">
        <h1>List of Colleges</h1>

        {{-- Add College Button --}}
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

        <!-- Edit College Modal -->
        <div class="modal fade" id="editCollegeModal" tabindex="-1" aria-labelledby="editCollegeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCollegeModalLabel">Edit College</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Edit College Form -->
                        <form id="editCollegeForm" action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="col_code" class="form-label">College Code</label>
                                <input type="text" class="form-control" id="edit-col_code" name="col_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="col_name" class="form-label">College Name</label>
                                <input type="text" class="form-control" id="edit-col_name" name="col_name" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
        {{-- College Table --}}
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
                <tr data-id="{{ $college->col_id }}" data-code="{{ $college->col_code }}" data-name="{{ $college->col_name }}">
                    <td>{{ $college->col_id }}</td>
                    <td>{{ $college->col_code }}</td>
                    <td>{{ $college->col_name }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a href="#" class="edit-btn dropdown-item" data-bs-toggle="modal" data-bs-target="#editCollegeModal">Edit</a></li>
                                <li><a href="#" class="delete-btn dropdown-item" data-id="{{ $college->col_id }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-btn');
            const deleteButtons = document.querySelectorAll('.delete-btn');

            // Edit College Button Javascript
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');
                    const collegeId = row.getAttribute('data-id');
                    const collegeCode = row.getAttribute('data-code');
                    const collegeName = row.getAttribute('data-name');

                    document.getElementById('edit-col_code').value = collegeCode;
                    document.getElementById('edit-col_name').value = collegeName;

                    const form = document.getElementById('editCollegeForm');
                    form.setAttribute('action', `/college/${collegeId}`);
                });
            });

            // Delete College Button Javascript
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const collegeId = this.getAttribute('data-id');

                    if (confirm('Are you sure you want to delete this college?')) {
                        fetch(`/college/${collegeId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const row = document.querySelector(`tr[data-id="${collegeId}"]`);
                                row.remove();
                            } else {
                                alert('An error occurred while deleting the college.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                });
            });
        });

    </script>
@endsection
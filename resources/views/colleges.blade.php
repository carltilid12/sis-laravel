@extends('template')

@section('title')
    Colleges
@endsection

@section('content')
    <div class="container mt-5">
        <h1>List of Colleges</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>College Code</th>
                    <th>College Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                <tr>
                    <td>{{ $college->id }}</td>
                    <td>{{ $college->collegeCode }}</td>
                    <td>{{ $college->collegeName }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
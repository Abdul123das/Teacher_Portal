@extends('teachers.layout')

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                <h2>Teacher Profile</h2>
                <a class="btn btn-primary" href="{{ route('teachers.list') }}">Back</a>
            </div>
        </div>

        <div class="card shadow-sm mt-4 p-4">
            <div class="row">
                <!-- Profile Picture -->
                <div class="col-md-4 text-center">
                    <img src="{{ $teacher['profile_picture'] ? asset('storage/' . $teacher['profile_picture']) : asset($teacher['profile_picture']) }}"alt="Profile Picture" class="img-fluid rounded-circle shadow" style="width: 200px; height: 200px; object-fit: cover;">

                </div>

                <!-- Teacher Details -->
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $teacher['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $teacher['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $teacher['phone'] }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $teacher['address'] }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth:</th>
                            <td>{{ $teacher['date_of_birth'] }}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{ ucfirst($teacher['gender']) }}</td>
                        </tr>
                        <tr>
                            <th>Subject Name:</th>
                            <td>{{ $teacher['subject_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Parent Name:</th>
                            <td>{{ $teacher['parent_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Parent Contact:</th>
                            <td>{{ $teacher['parent_contact'] }}</td>
                        </tr>
                        <tr>
                            <th>Details:</th>
                            <td>{{ $teacher['detail'] }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>{{ $teacher['status'] }}</td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $teacher['created_at'] ? $teacher['created_at'] : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

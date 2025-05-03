@extends('teachers.layout')
@section('content')
<div class="container p-5 mt-2">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Teacher's Detail</h2>
            <a class="btn btn-success" href="{{ route('teachers.create') }}">
                <i class="fas fa-plus"></i> Add new Teacher
            </a>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Details</th>
                        <th>Father</th>
                        <th>Father Contact</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher['created_at'] }}</td>
                        <td>{{ $teacher['name'] }}</td>
                        <td>{{ $teacher['email'] }}</td>
                        <td>{{ $teacher['address'] }} <br> {{ $teacher['phone'] }}</td>
                        <td>{{ $teacher['parent_name'] }}</td>
                        <td>{{ $teacher['parent_contact'] }}</td>
                        <td>
                            <form action="{{ route('teachers.destroy',$teacher['id']) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('teachers.profile',$teacher['id']) }}">
                                    <i class="fas fa-eye"></i> profile
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('teachers.edit',$teacher['id']) }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center">
        
        </div>
    </div>
@endsection
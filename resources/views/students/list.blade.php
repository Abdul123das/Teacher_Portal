@extends('students.layout')
@section('content')
<div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Student's Detail</h2>
            <a class="btn btn-success" href="{{ route('teachers.create') }}">
                <i class="fas fa-plus"></i> Add new Student
            </a>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->detail }}</td>
                        <td>
                            <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('teachers.show',$teacher->id) }}">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('teachers.edit',$teacher->id) }}">
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
            {!! $students->links() !!}
        </div>
    </div>
@endsection
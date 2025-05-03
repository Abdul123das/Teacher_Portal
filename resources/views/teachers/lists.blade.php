@extends('teachers.layout')
@section('content')
<div class="container p-5">
        <h2 class="text-primary mb-4">Teacher's List</h2>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher['created_at'] }}</td>
                        <td>{{ $teacher['name'] }}</td>
                        <td>{{ $teacher['email'] }}</td>
                        <td>{{ $teacher['phone'] }}</td>
                        <td>{{ $teacher['address'] }}</td>
                        <td>
                            <form action="{{ route('teachers.destroy',$teacher['id']) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('teachers.profile',$teacher['id']) }}">
                                    <i class="fas fa-eye"></i> Profile
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

        <!-- Pagination (Just for Demo) -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
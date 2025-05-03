@extends('teachers.layout')

@section('content')
<div class="container mt-2 p-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Add New Teacher</h2>
        <a class="btn btn-secondary" href="{{ route('teachers.list') }}">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-lg p-4">
        <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2">{{ old('address') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="subject_name" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="subject_name" name="subject_name" value="{{ old('subject_name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-control" id="gender">
                            <option value="">Select Gender</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                            <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="parent_name" class="form-label">Father Name</label>
                        <input type="text" class="form-control" id="parent_name" name="parent_name" value="{{ old('parent_name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="parent_contact" class="form-label">Father Contact</label>
                        <input type="number" class="form-control" id="parent_contact" name="parent_contact" value="{{ old('parent_contact') }}">
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Some other Details</label>
                        <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail') }}">
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Add Teacher
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

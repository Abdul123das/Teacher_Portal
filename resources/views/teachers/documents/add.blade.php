<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @else
    <div class="container mt-5">
        <form action="{{ route('teachers.documents.store',$teacher_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="teacher_id" id="teacher_id" value="{{$teacher_id}}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="title" class="form-control" name="title" id="title" required>
            </div>
            <div class="mb-3">
                <label for="document" class="form-label">File</label>
                <input type="file" class="form-control" name="document" id="document" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

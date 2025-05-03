@extends('teachers.layout')
@section('left_menu')
<nav class="sidebar d-flex flex-column p-3 text-white">
            <h4 class="text-center text-white">Teacher Portal</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teachers.list') }}">
                        <i class="fas fa-chalkboard-teacher"></i> Teachers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.list') }}">
                        <i class="fas fa-user-graduate"></i> Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-tasks"></i> Assignments
                    </a>
                </li>
            </ul>
        </nav>
@endsection
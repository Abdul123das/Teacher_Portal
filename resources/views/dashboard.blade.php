@extends('teachers.layout')

@section('content')
<div class="d-flex">
        <!-- Main Content -->
        <div class="container p-5">
            <h2 class="text-primary">Teacher Dashboard</h2>
            
            <!-- Stats Cards -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-primary text-white text-center p-3">
                        <h5>Total Teachers</h5>
                        <h3>{{$teacher_count}}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white text-center p-3">
                        <h5>Total Students</h5>
                        <h3>{{$student_count}}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white text-center p-3">
                        <h5>Total Assignments</h5>
                        <h3>100</h3>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5>Recent Activities</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Assignment uploaded by Mr. Smith</li>
                    <li class="list-group-item">New student enrolled: John Doe</li>
                    <li class="list-group-item">Exam schedule updated</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
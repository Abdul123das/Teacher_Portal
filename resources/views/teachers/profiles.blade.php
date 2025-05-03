@extends('teachers.layout')

@section('content')
<div class="container p-5">
    <!-- Teacher Profile Header -->
    <div class="profile-header d-flex align-items-center">
    <img src="{{ $teacher['profile_picture'] ? asset('storage/' . $teacher['profile_picture']) : asset($teacher['profile_picture']) }}"alt="Profile Picture" class="img-fluid rounded-circle shadow" style="width: 200px; height: 100px; object-fit: cover;">
        <div>
            <h3>{{ $teacher['name'] }}</h3>
            <p>Subject: {{ $teacher['subject_name'] }}</p>
            <p>Email: {{ $teacher['email'] }}</p>
            <p>Phone: {{ $teacher['phone'] }}</p>
        </div>
    </div>

    <!-- Nav Pills for Tabs -->
    <ul class="nav nav-pills" id="teacherTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-bs-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="class-tab" data-bs-toggle="pill" href="#class" role="tab" aria-controls="class" aria-selected="false">Class</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="student-tab" data-bs-toggle="pill" href="#student" role="tab" aria-controls="student" aria-selected="false">Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="documents-tab" data-bs-toggle="pill" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="teacherTabsContent">
        <!-- Profile Tab -->
        
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h4>Teacher Profile</h4>
            <div class="">
                <div class="">
                    <div class="row">
                        <!-- Personal Info -->
                        <div class="col-md-6">
                            <div style="color: #276d8f !important;background-color: #d9edf7 !important;border-color: #bce8f1 !important;padding: 10px;">Personal Info</div>
                            <div>
                                <table class="table table-bordered" style="font-size:15px;">
                                    <tr>
                                        <th>Name:</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth:</th>
                                        <td>January 1, 1980</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <th>Subject:</th>
                                        <td>Mathematics</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Contact Info -->
                        <div class="col-md-6">
                            <div style="color: #276d8f !important;background-color: #d9edf7 !important;border-color: #bce8f1 !important;padding: 10px;">Contact Info</div>
                            <table class="table table-bordered" style="font-size:15px;">
                                <tr>
                                    <th>Email:</th>
                                    <td>john.doe@example.com</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>+1234567890</td>
                                </tr>
                                <tr>
                                    <th>Parent Name:</th>
                                    <td>Jane Doe</td>
                                </tr>
                                <tr>
                                    <th>Parent Contact:</th>
                                    <td>+0987654321</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Address Info -->
                        <div class="col-md-6">
                            <div style="color: #276d8f !important;background-color: #d9edf7 !important;border-color: #bce8f1 !important;padding: 10px;">Address Info</div>
                            <table class="table table-bordered" style="font-size:15px;">
                                <tr>
                                    <th>Address:</th>
                                    <td>1234 Elm Street, Springfield</td>
                                </tr>
                            </table>
                        </div>
                        <!-- Additional Info -->
                        <div class="col-md-6">
                            <div style="color: #276d8f !important;background-color: #d9edf7 !important;border-color: #bce8f1 !important;padding: 10px;">Additional Info</div>
                            <table class="table table-bordered" style="font-size:15px;">
                                <tr>
                                    <th>Status:</th>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <th>Created At:</th>
                                    <td>January 15, 2015</td>
                                </tr>
                                <tr>
                                    <th>Details:</th>
                                    <td>John has been teaching for over 10 years and has a passion for helping students
                                        excel in Mathematics.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class Tab -->
        <div class="tab-pane fade" id="class" role="tabpanel" aria-labelledby="class-tab">
            <h4>Classes Taught</h4>
            <ul class="list-group">
                <li class="list-group-item">Math 101 - Introduction to Algebra</li>
                <li class="list-group-item">Math 102 - Calculus I</li>
                <li class="list-group-item">Math 103 - Linear Algebra</li>
            </ul>
        </div>

        <!-- Student Tab -->
        <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">
            <h4>Students</h4>
            <ul class="list-group student-list">
                <li class="list-group-item">Alice Johnson</li>
                <li class="list-group-item">Bob Smith</li>
                <li class="list-group-item">Charlie Brown</li>
                <li class="list-group-item">David Lee</li>
                <li class="list-group-item">Eva White</li>
            </ul>
        </div>

        <!-- Documents Tab -->
        <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
            <div class="row">
                <div class="cl-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <h4>Documents</h4>
                </div>
                <div class="cl-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <a href="{{ route('teachers.documents.create',$teacher['id']) }}"  data-bs-toggle="modal" data-bs-target="#iframeModal" class="btn btn-primary">Add Document</a>
                </div>
            </div>
            <ul class="list-group doc-list">
                <li class="list-group-item">
                    <a href="#">Math 101 Syllabus</a> <small>(PDF)</small>
                </li>
                <li class="list-group-item">
                    <a href="#">Math 102 Lecture Notes</a> <small>(DOCX)</small>
                </li>
                <li class="list-group-item">
                    <a href="#">Math 103 Assignment Sheet</a> <small>(PDF)</small>
                </li>
                <li class="list-group-item">
                    <a href="#">Math 102 Midterm Exam</a> <small>(PDF)</small>
                </li>
                <li class="list-group-item">
                    <a href="#">Math 101 Grading Rubric</a> <small>(XLSX)</small>
                </li>
            </ul>
        </div>
        <div class="modal fade" id="iframeModal" tabindex="-1" aria-labelledby="iframeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="iframeModalLabel">Add Teacher Document {{ $teacher['name'] }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- iframe for Add New Product Page -->
                    <iframe src="{{ route('teachers.documents.create',$teacher['id']) }}" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

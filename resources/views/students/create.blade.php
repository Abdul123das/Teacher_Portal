@extends('teachers.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Teacher</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('teachers.index') }}"> Back</a>
        </div>
    </div>
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
<form action="{{ route('teachers.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
     <!-- Teacher Information -->
     <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="bio">Bio/Description</label>
        <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="profile_picture">Profile Picture</label>
        <input type="file" class="form-control" id="profile_picture" name="profile_picture">
    </div>

    <!-- Subjects Taught -->
    <div class="form-group">
        <label for="subject_name">Subject Name</label>
        <input type="text" class="form-control" id="subject_name" name="subject_name" required>
    </div>

    <div class="form-group">
        <label for="grade_level">Grade Level</label>
        <input type="text" class="form-control" id="grade_level" name="grade_level" required>
    </div>

    <!-- Classes/Courses -->
    <div class="form-group">
        <label for="course_name">Course Name</label>
        <input type="text" class="form-control" id="course_name" name="course_name">
    </div>

    <div class="form-group">
        <label for="schedule">Class Schedule</label>
        <input type="text" class="form-control" id="schedule" name="schedule">
    </div>

    <div class="form-group">
        <label for="classroom_link">Classroom/Online Link</label>
        <input type="text" class="form-control" id="classroom_link" name="classroom_link">
    </div>

    <!-- Student Management -->
    <div class="form-group">
        <label for="students">List of Students</label>
        <textarea class="form-control" id="students" name="students" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="grades">Student Grades</label>
        <textarea class="form-control" id="grades" name="grades" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="attendance">Attendance Records</label>
        <textarea class="form-control" id="attendance" name="attendance" rows="3"></textarea>
    </div>

    <!-- Assignments and Assessments -->
    <div class="form-group">
        <label for="assignment_title">Assignment Title</label>
        <input type="text" class="form-control" id="assignment_title" name="assignment_title">
    </div>

    <div class="form-group">
        <label for="assignment_description">Description</label>
        <textarea class="form-control" id="assignment_description" name="assignment_description" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" class="form-control" id="due_date" name="due_date">
    </div>

    <div class="form-group">
        <label for="grading_criteria">Grading Criteria</label>
        <textarea class="form-control" id="grading_criteria" name="grading_criteria" rows="3"></textarea>
    </div>

    <!-- Communication -->
    <div class="form-group">
        <label for="messaging_system">Messaging System</label>
        <textarea class="form-control" id="messaging_system" name="messaging_system" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="announcements">Announcement Board</label>
        <textarea class="form-control" id="announcements" name="announcements" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="notifications">Notifications</label>
        <textarea class="form-control" id="notifications" name="notifications" rows="3"></textarea>
    </div>

    <!-- Reports and Analytics -->
    <div class="form-group">
        <label for="performance_reports">Performance Reports</label>
        <textarea class="form-control" id="performance_reports" name="performance_reports" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="student_progress">Student Progress Tracking</label>
        <textarea class="form-control" id="student_progress" name="student_progress" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="assessment_results">Assessment Results</label>
        <textarea class="form-control" id="assessment_results" name="assessment_results" rows="3"></textarea>
    </div>

    <!-- Settings and Admin Tools -->
    <div class="form-group">
        <label for="user_roles">User Roles (Admin, Teacher, Student)</label>
        <input type="text" class="form-control" id="user_roles" name="user_roles">
    </div>

    <div class="form-group">
        <label for="security_settings">Security Settings</label>
        <textarea class="form-control" id="security_settings" name="security_settings" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="data_backup">Data Backup</label>
        <textarea class="form-control" id="data_backup" name="data_backup" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Add Teacher</button>
</form>
@endsection
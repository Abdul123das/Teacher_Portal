<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use App\Repositories\CommonRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class TeacherController extends Controller
{
    protected $teacherRepo;
    protected $commonRepo;

    public function __construct(TeacherRepository $teacherRepo, CommonRepository $commonRepo)
    {
        $this->teacherRepo = $teacherRepo;
        $this->commonRepo = $commonRepo;
    }

    public function list()
    {
        $teachers = $this->teacherRepo->getAll();
        return view('teachers.lists', compact('teachers'));
    }

    public function dashboard()
    {
        $recent_activities = array();
        $teacher_count = $this->commonRepo->teacher_count();
        $student_count = $this->commonRepo->student_count();
        return view('dashboard', compact('recent_activities','teacher_count','student_count'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        // ✅ Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:M,F,O',
            'parent_name' => 'required|string|max:255',
            'parent_contact' => 'required|string|max:20',
            'detail' => 'nullable|string',
            'remarks' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // ✅ Validate profile picture
        ]);

        // ✅ Handle profile picture upload
        $profile_picture = null;
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $profile_picture = $file->store('teachers', 'public'); // ✅ Correct: Stores only relative path
        } else {
            $profile_picture = 'images/default-profile.png'; // ✅ Correct: Stores relative path
        }

        // ✅ Create teacher record
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'parent_name' => $request->parent_name,
            'subject_name' => $request->subject_name,
            'parent_contact' => $request->parent_contact,
            'detail' => $request->detail,
            'remarks' => $request->remarks,
            'profile_picture' => $profile_picture, // ✅ Store file path
        ]);

        return redirect()->route('teachers.list')->with('success', 'Teacher created successfully.');
    }


    public function profile($teacher_id)
    {
        $teacher = $this->teacherRepo->findById($teacher_id);
        return view('teachers.profiles', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = $this->teacherRepo->findById($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
{
    // Validate input (Fixed unique email validation)
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'date_of_birth' => 'required|date',
        'gender' => 'required',
        'parent_name' => 'required',
        'parent_contact' => 'required',
        'detail' => 'nullable',
        'remarks' => 'nullable',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image file
    ]);

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/teachers'), $filename);

        // Delete old profile picture if exists
        if (!empty($teacher->profile_picture) && file_exists(public_path('uploads/teachers/' . $teacher->profile_picture))) {
            unlink(public_path('uploads/teachers/' . $teacher->profile_picture));
        }

        // Assign new profile picture filename
        $teacher->profile_picture = $filename;
    }

    // Update teacher record (excluding profile picture)
    $teacher->update($request->except(['profile_picture']));

    // Save profile picture separately (if updated)
    if ($request->hasFile('profile_picture')) {
        $teacher->save();
    }

    return redirect()->route('teachers.list')->with('success', 'Teacher updated successfully');
}

public function destroy($teacher_id)
{
    $teacher = $this->teacherRepo->findById($teacher_id);
    $teacher->delete();
    return redirect()->route('teachers.list')->with('success', 'Teacher deleted successfully');
}

}
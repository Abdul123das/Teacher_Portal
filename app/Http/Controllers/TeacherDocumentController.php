<?php

namespace App\Http\Controllers;

use App\Models\TeacherDocument;
use App\Repositories\TeacherRepository;
use App\Repositories\CommonRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class TeacherDocumentController extends Controller
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
        return view('teachers.documents.lists', compact('teachers'));
    }

    public function dashboard()
    {
        $recent_activities = array();
        $teacher_count = $this->commonRepo->teacher_count();
        $student_count = $this->commonRepo->student_count();
        return view('dashboard', compact('recent_activities','teacher_count','student_count'));
    }

    public function create($teacher_id)
    {
        return view('teachers.documents.add',compact('teacher_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|int',
            'title' => 'required|string|max:255',
            'document' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $profile_picture = null;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $profile_picture = $file->store('teachers/documents', 'public');
        } else {
            $profile_picture = 'images/default-profile.png';
        }
    
        TeacherDocument::create([
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'document' => $profile_picture,
        ]);
    
        return redirect()->back()
                     ->with('success', 'Teacher Documents created successfully.')
                     ->withInput();  // Retains the input data
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
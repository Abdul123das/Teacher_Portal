<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list()
    {
        $students = Student::latest()->paginate(5);
        return view('students.list', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function dashboard()
    {
        $recent_activities = array();
        return view('dashboard', compact('recent_activities'));
    }

    public function create()
    {
        return view('Students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        Student::create($request->all());
        return redirect()->route('Students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $Student)
    {
        return view('Students.show', compact('Student'));
    }

    public function edit(Student $Student)
    {
        return view('Students.edit', compact('Student'));
    }

    public function update(Request $request, Student $Student)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $Student->update($request->all());
        return redirect()->route('Students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $Student)
    {
        $Student->delete();
        return redirect()->route('Students.index')->with('success', 'Student deleted successfully');
    }
}
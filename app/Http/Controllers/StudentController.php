<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Classroom;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $grades = Grade::all();
        $classrooms = Classroom::all();

        return view('students.create')->with(['users' => $users, 'grades' => $grades, 'classrooms' => $classrooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();

        // store
        Student::create($data);

        // redirect
        return redirect(route('students.index'))->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // show the view and pass the student to it
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();

        // show the edit form and pass the student
        return view('students.edit')->with(['student' => $student, 'grades' => $grades, 'classrooms' => $classrooms]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $request->validated();

        // update
        $student->update($data);

        // redirect
        return redirect(route('students.index'))->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // delete
        $student->delete();

        // redirect
        return redirect(route('students.index'))->with('success', 'Student Delete Successfully');
    }
}

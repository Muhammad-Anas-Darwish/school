<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Classroom;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     *  Display the student resource
     */
    public function showProfile()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        // show the view and pass the student
        return view('students.show_profile', compact('student'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $students = Student::query();

        // Filter
        if ($request->has('first_name')) // filter first_name
            $students->where('first_name', 'like', '%' . $request->get('first_name') . '%');

        if ($request->has('last_name')) // filter last_name
            $students->where('last_name', 'like', '%' . $request->get('last_name') . '%');

        if ($request->has('gender') && $request->get('gender') != '') // filter gender
            $students->where('gender', $request->get('gender'));

        if ($request->has('grade') && $request->get('grade') != '') // filter grade
            $students->where('grade_id', $request->get('grade'));

        if ($request->has('classroom') && $request->get('classroom') != '') // filter classroom
            $students->where('classroom_id', $request->get('classroom'));

        // Get All Students
        $students = $students->get();

        return view('students.index', compact('grades', 'classrooms'))->with('students', $students);
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

        // create user
        $user = User::create(['username' => $data['first_name'] . $data['last_name'], 'password' => bcrypt($data['password'])]);
        $data['user_id'] = $user->id;

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

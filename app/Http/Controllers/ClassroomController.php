<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Grade;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();

        return view('classrooms.index')->with('classrooms', $classrooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pass all grades
        $grades = Grade::all();

        return view('classrooms.create')->with('grades', $grades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        $data = $request->validated();

        // store
        classroom::create($data);

        // redirect
        return redirect(route('classrooms.index'))->with('success', 'Classroom added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        return view('classrooms.show')->with('classroom', $classroom);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        $grades = Grade::all();

        // show the edit form and pass the classroom
        return view('classrooms.edit')->with(['classroom' => $classroom, 'grades' => $grades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $data = $request->validated();

        // update
        $classroom->update($data);

        // redirect
        return redirect(route('classrooms.index'))->with('success', 'Classroom updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        // delete
        $classroom->delete();

        // redirect
        return redirect(route('classrooms.index'))->with('success', 'Classroom Delete Successfully');
    }
}

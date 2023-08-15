<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = Semester::all();

        return view('semesters.index')->with('semesters', $semesters);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSemesterRequest $request)
    {
        $data = $request->validated();

        // store
        Semester::create($data);

        // redirect
        return redirect(route('semesters.index'))->with('success', 'Semester added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        return view('semesters.show')->with('semester', $semester);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        // show the edit form and pass the semester
        return view('semesters.edit')->with('semester', $semester);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        $data = $request->validated();

        // update
        $semester->update($data);

        // redirect
        return redirect(route('semesters.index'))->with('success', 'Semester updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        // delete
        $semester->delete();

        // redirect
        return redirect(route('semesters.index'))->with('success', 'Semester Delete Successfully');
    }
}

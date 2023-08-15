<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();

        return view('grades.index')->with('grades', $grades);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request)
    {
        $data = $request->validated();

        // store
        Grade::create($data);

        // redirect
        return redirect(route('grades.index'))->with('success', 'Grade added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        // show the view and pass the grade to it
        return view('grades.show')->with('grade', $grade);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        // show the edit form and pass the grade
        return view('grades.edit')->with('grade', $grade);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $data = $request->validated();

        // update
        $grade->update($data);

        // redirect
        return redirect(route('grades.index'))->with('success', 'Grade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        // delete
        $grade->delete();

        // redirect
        return redirect(route('grades.index'))->with('success', 'Grade Delete Successfully');
    }
}

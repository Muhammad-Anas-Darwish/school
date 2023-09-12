<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use App\Models\Subject;
use App\Models\ExaminationMark;
use App\Http\Requests\StoreExaminationMarkRequest;
use App\Http\Requests\UpdateExaminationMarkRequest;

class ExaminationMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examinationMarks = ExaminationMark::all();

        return view('examination_marks.index')->with('examinationMarks', $examinationMarks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();

        return view('examination_marks.create', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExaminationMarkRequest $request)
    {
        $data = $request->validated();

        // store
        ExaminationMark::create($data);

        // redirect
        return redirect(route('examination_marks.index'))->with('success', 'Examination Mark added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExaminationMark $examinationMark)
    {
        // show the view and pass the examination mark to it
        return view('examination_marks.show')->with('examinationMark', $examinationMark);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExaminationMark $examinationMark)
    {
        $students = Student::all();
        $subjects = Subject::all();

        // show the edit form and pass the examination mark
        return view('examination_marks.edit', compact('students', 'subjects'))->with('examinationMark', $examinationMark);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExaminationMarkRequest $request, ExaminationMark $examinationMark)
    {
        $data = $request->validated();

        // update
        $examinationMark->update($data);

        // redirect
        return redirect(route('examination_marks.index'))->with('success', 'Examination Mark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExaminationMark $examinationMark)
    {
        // delete
        $examinationMark->delete();

        // redirect
        return redirect(route('examination_marks.index'))->with('success', 'Examination Mark Delete Successfully');
    }
}

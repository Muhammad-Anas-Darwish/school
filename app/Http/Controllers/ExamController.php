<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::all();

        return view('exams.index')->with('exams', $exams);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        $data = $request->validated();

        // store
        Exam::create($data);

        // redirect
        return redirect(route('exams.index'))->with('success', 'Exam added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return view('exams.show')->with('exam', $exam);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        // show the edit form and pass the exam
        return view('exams.edit')->with('exam', $exam);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $data = $request->validated();

        // update
        $exam->update($data);

        // redirect
        return redirect(route('exams.index'))->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        // delete
        $exam->delete();

        // redirect
        return redirect(route('exams.index'))->with('success', 'Exam Delete Successfully');
    }
}

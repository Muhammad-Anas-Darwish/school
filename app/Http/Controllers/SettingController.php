<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Year;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $currentSemesterId = Semester::where('current_semester', true)->first();
        if ($currentSemesterId)
            $currentSemesterId = $currentSemesterId['id'];
        $semesters = Semester::all();

        $currentYearId = Year::where('current_year', true)->first();
        if ($currentYearId)
            $currentYearId = $currentYearId['id'];
        $years = Year::all();

        $currentExamId = Exam::where('current_exam', true)->first();
        if ($currentExamId)
            $currentExamId = $currentExamId['id'];
        $exams = Exam::all();

        return view('settings.edit', compact('currentSemesterId', 'semesters', 'currentYearId', 'years', 'currentExamId', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request)
    {
        $data = $request->validated();

        Semester::setCurrentSemester($data['semester_id']);
        Year::setCurrentYear($data['year_id']);
        Exam::setCurrentExam($data['exam_id']);

        // redirect
        return redirect(route('home'))->with('success', 'Setting updated successfully');
    }
}

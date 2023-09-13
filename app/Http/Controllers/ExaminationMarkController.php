<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Year;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\ExaminationMark;
use App\Http\Requests\StoreExaminationMarkRequest;
use App\Http\Requests\UpdateExaminationMarkRequest;

class ExaminationMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $grades = Grade::all();
        $years = Year::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        $exams = Exam::all();
        $examinationMarks = ExaminationMark::query();

        // Filter
        if ($request->has('mark') && $request->get('mark') != '') // filter mark
            $examinationMarks->where('mark', $request->get('mark'));

        if ($request->has('grade') && $request->get('grade') != '') // filter grade
            $examinationMarks->where('grade_id', $request->get('grade'));

        if ($request->has('year') && $request->get('year') != '') // filter year
            $examinationMarks->where('year_id', $request->get('year'));

        if ($request->has('subject') && $request->get('subject') != '') // filter subject
            $examinationMarks->where('subject_id', $request->get('subject'));

        if ($request->has('exam') && $request->get('exam') != '') // filter exam
            $examinationMarks->where('exam_id', $request->get('exam'));

        if ($request->has('semester') && $request->get('semester') != '') { // filter semester
            $examinationMarks->whereHas('exam', function ($query) use ($request) {
                $query->where('semester_id', $request->get('semester'));
            });
        }

        // Get All examinationMarks
        $examinationMarks = $examinationMarks->get();

        return view('examination_marks.index', compact('grades', 'years', 'semesters', 'subjects', 'exams', 'examinationMarks'));
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

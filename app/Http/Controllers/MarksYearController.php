<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\MarksYear;
use App\Models\Semester;
use App\Http\Requests\StoreMarksYearRequest;
use App\Http\Requests\UpdateMarksYearRequest;
use App\Models\Grade;
use App\Models\Year;
use Illuminate\Http\Request;

class MarksYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $grades = Grade::all();
        $years = Year::all();
        $semesters = Semester::all();
        $marksYear = MarksYear::query();

        // Filter
        if ($request->has('mark') && $request->get('mark') != '') // filter mark
            $marksYear->where('mark', $request->get('mark'));

        if ($request->has('type') && $request->get('type')) // filter type
            $marksYear->where('type', $request->get('type'));

        if ($request->has('grade') && $request->get('grade') != '') // filter grade
            $marksYear->where('grade_id', $request->get('grade'));

        if ($request->has('semester') && $request->get('semester') != '') // filter semester
            $marksYear->where('semester_id', $request->get('semester'));

        if ($request->has('year') && $request->get('year') != '') // filter year
            $marksYear->where('year_id', $request->get('year'));

        // Get All marksYear
        $marksYear = $marksYear->get();

        return view('marks_year.index', compact('grades', 'years', 'semesters'))->with('marksYear', $marksYear);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $semesters = Semester::all();

        return view('marks_year.create', compact('students', 'subjects', 'semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarksYearRequest $request)
    {
        $data = $request->validated();

        // store
        MarksYear::create($data);

        // redirect
        return redirect(route('marks_year.index'))->with('success', 'Mark Year added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MarksYear $marksYear)
    {
        // show the view and pass the mark_year to it
        return view('marks_year.show')->with('markYear', $marksYear);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MarksYear $marksYear)
    {
        $students = Student::all();
        $subjects = Subject::all();
        $semesters = Semester::all();

        // show the edit form and pass the mark year
        return view('marks_year.edit', compact('students', 'subjects', 'semesters'))->with('markYear', $marksYear);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarksYearRequest $request, MarksYear $marksYear)
    {
        $data = $request->validated();

        // update
        $marksYear->update($data);

        // redirect
        return redirect(route('marks_year.index'))->with('success', 'Mark Year updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarksYear $marksYear)
    {
        // delete
        $marksYear->delete();

        // redirect
        return redirect(route('marks_year.index'))->with('success', 'Mark Year Delete Successfully');
    }
}

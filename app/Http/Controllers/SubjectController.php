<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $grades = Grade::all();
        $subjects = Subject::all();

        // Filter
        // TODO edit this code
        if ($request->has('title') && $request->get('title') != '') // filter title
            $subjects = Subject::where('title', 'like', '%' . $request->get('title') . '%')->get();

        if ($request->has('grade') && $request->get('grade') != '') // filter grade
            $subjects = $subjects->where('grade_id', $request->get('grade'));

        return view('subjects.index')->with(['subjects' => $subjects, 'grades' => $grades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();

        return view('subjects.create')->with('grades', $grades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $data = $request->validated();

        // store
        Subject::create($data);

        // redirect
        return redirect(route('subjects.index'))->with('success', 'Subject added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        // show the view and pass the subject to it
        return view('subjects.show')->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $grades = Grade::all();

        // show the edit form and pass the subject and grade
        return view('subjects.edit')->with(['subject' => $subject, 'grades' => $grades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $data = $request->validated();

        // update
        $subject->update($data);

        // redirect
        return redirect(route('subjects.index'))->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        // delete
        $subject->delete();

        // redirect
        return redirect(route('subjects.index'))->with('success', 'Subject Delete Successfully');
    }
}

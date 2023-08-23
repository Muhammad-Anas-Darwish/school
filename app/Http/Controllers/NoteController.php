<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Exceptions\YearsTableEmptyException;

class NoteController extends Controller
{
    public function showNotes()
    {
        $user = Auth::user();
        $student = $user->student;

        $notes = Note::where('student_id', $student->id)->get();

        return view('notes.show_notes', compact('notes'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();

        return view('notes.index')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('notes.create')->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $data = $request->validated();

        try {
            // store
            Note::create($data);
        } catch (YearsTableEmptyException $e) {
            return redirect(route('notes.create'))->with('error', $e->getMessage());
        }

        // redirect
        return redirect(route('notes.index'))->with('success', 'Note added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        // show the view and pass the notes to it
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        // show the edit form and pass the notes
        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $data = $request->validated();

        // update
        $note->update(array_merge($data, ['been_read' => false]));

        // redirect
        return redirect(route('notes.index'))->with('success', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // delete
        $note->delete();

        // redirect
        return redirect(route('notes.index'))->with('success', 'Note Delete Successfully');
    }
}

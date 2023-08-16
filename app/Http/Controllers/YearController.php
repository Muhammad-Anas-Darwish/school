<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = Year::all();

        return view('years.index')->with('years', $years);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreYearRequest $request)
    {
        $data = $request->validated();

        // store
        Year::create($data);

        // redirect
        return redirect(route('years.index'))->with('success', 'Year added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Year $year)
    {
        // show the view and pass the year to it
        return view('years.show')->with('year', $year);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        // show the edit form and pass the year
        return view('years.edit')->with('year', $year);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateYearRequest $request, Year $year)
    {
        $data = $request->validated();

        // update
        $year->update($data);

        // redirect
        return redirect(route('years.index'))->with('success', 'Year updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        // delete
        $year->delete();

        // redirect
        return redirect(route('years.index'))->with('success', 'Year Delete Successfully');
    }
}

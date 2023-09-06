<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Semester;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $currentSemesterId = Semester::where('current_semester', true)->first()['id'];
        $semesters = Semester::all();

        return view('settings.edit', compact('currentSemesterId', 'semesters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request)
    {
        $data = $request->validated();

        Semester::setCurrentSemester($data['semester_id']);

        // redirect
        return redirect(route('home'))->with('success', 'Setting updated successfully');
    }
}

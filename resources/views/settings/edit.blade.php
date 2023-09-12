@extends('layouts.master')

@section('content')
    <form action="{{url(route('settings.update'))}}" method="post">
        @csrf
        @method('patch')

        Semester:
        <select name="semester_id">
            <option>--------</option>
            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}" @if ($currentSemesterId == $semester->id) selected @endif>{{ $semester->title }}</option>
            @endforeach
        </select>
        @error('semester_id')
            <div>- {{ $message }}</div>
        @enderror

        <br>
        Year
        <select name="year_id">
            <option>--------</option>
            @foreach ($years as $year)
                <option value="{{ $year->id }}" @if ($currentYearId == $year->id) selected @endif>{{ $year->title }}</option>
            @endforeach
        </select>
        @error('year_id')
            <div>- {{ $message }}</div>
        @enderror

        <br>
        Exam
        <select name="exam_id">
            <option>--------</option>
            @foreach ($exams as $exam)
                <option value="{{ $exam->id }}" @if ($currentExamId == $exam->id) selected @endif>{{ $exam->title }}</option>
            @endforeach
        </select>
        @error('exam_id')
            <div>- {{ $message }}</div>
        @enderror

        <input type="submit" value="Save">
    </form>
@endsection

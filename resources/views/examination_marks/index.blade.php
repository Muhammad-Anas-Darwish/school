@extends('layouts.master')

@section('content')

{{-- filter --}}
<form>
    mark:
    <input type="number" name="mark" max="10">
    grade:
    <select name="grade">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->title }}</option>
        @endforeach
    </select>
    year:
    <select name="year">
        <option value="">--------</option>
        @foreach ($years as $year)
            <option value="{{ $year->id }}">{{ $year->title }}</option>
        @endforeach
    </select>
    semester:
    <select name="semester">
        <option value="">--------</option>
        @foreach ($semesters as $semester)
            <option value="{{ $semester->id }}">{{ $semester->title }}</option>
        @endforeach
    </select>
    subject:
    <select name="subject">
        <option value="">--------</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
        @endforeach
    </select>
    exam:
    <select name="exam">
        <option value="">--------</option>
        @foreach ($exams as $exam)
            <option value="{{ $exam->id }}">{{ $exam->title }}</option>
        @endforeach
    </select>
    <input type="submit" value="Filter">
</form>

@foreach ($examinationMarks as $examinationMark)
    mark: {{ $examinationMark->mark }}
    student: {{ $examinationMark->student->first_name }} {{ $examinationMark->student->last_name }}
    subject: {{ $examinationMark->subject->title }}
    grade: {{ $examinationMark->grade->title }}
    year: {{ $examinationMark->year->title }}
    semester: {{ $examinationMark->exam->semester->title }}
    exam: {{ $examinationMark->exam->title }}
    <form action="{{ url(route('examination_marks.destroy', $examinationMark->id)) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


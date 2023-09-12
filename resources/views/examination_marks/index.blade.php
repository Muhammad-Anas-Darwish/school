@extends('layouts.master')

@section('content')

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


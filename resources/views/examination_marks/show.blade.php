@extends('layouts.master')

@section('content')
    <h3>mark: {{ $examinationMark->mark }}</h3>
    <h3>student username: {{ $examinationMark->student->user->username }}</h3>
    <h3>subject: {{ $examinationMark->subject->title }}</h3>
    <h3>grade: {{ $examinationMark->grade->title }}</h3>
    <h3>year: {{ $examinationMark->year->title }}</h3>
    <h3>semester: {{ $examinationMark->exam->semester->title }}</h3>
    <h3>exam: {{ $examinationMark->exam->title }}</h3>
@endsection

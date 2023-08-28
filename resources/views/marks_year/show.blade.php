@extends('layouts.master')

@section('content')
    <h3>mark: {{ $markYear->mark }}</h3>
    <h3>type: {{ $markYear->type }}</h3>
    <h3>student username: {{ $markYear->student->user->username }}</h3>
    <h3>subject: {{ $markYear->subject->title }}</h3>
    <h3>grade: {{ $markYear->grade->title }}</h3>
    <h3>year: {{ $markYear->year->title }}</h3>
    <h3>semester: {{ $markYear->semester->title }}</h3>
@endsection

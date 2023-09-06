@extends('layouts.master')

@section('content')
<form action="{{ url(route('exams.update', $exam->id)) }}" method="post">
    @method('put')
    @csrf

    <input type="text" name="title" value="{{ $exam->title }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <input type="number" name="semester_id" value="{{ $exam->semester_id }}">
    @error('semester_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

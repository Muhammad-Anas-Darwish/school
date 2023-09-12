@extends('layouts.master')

@section('content')
<form action="{{ url(route('exams.update', $exam->id)) }}" method="post">
    @method('put')
    @csrf

    <input type="text" name="title" value="{{ $exam->title }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <select name="semester_id">
        <option>--------</option>
        @foreach ($semesters as $semester)
            <option value="{{ $semester->id }}" @if ($exam->semester_id == $semester->id) selected @endif>{{ $semester->title }}</option>
        @endforeach
    </select>
    @error('semester_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

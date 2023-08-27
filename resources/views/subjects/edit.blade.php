@extends('layouts.master')

@section('content')
<form action="{{ url(route('subjects.update', $subject->id)) }}" method="post">
    @method('put')
    @csrf

    title:
    <input type="text" name="title" value="{{ $subject->title }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <br>

    full mark:
    <input type="number" name="full_mark" value="{{ $subject->full_mark }}">
    @error('full_mark')
        <div>- {{ $message }}</div>
    @enderror

    <br>

    grade: 
    <select name="grade_id">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}" @if ($subject->grade_id === $grade->id) selected @endif>{{ $grade->title }}</option>
        @endforeach
    </select>
    @error('grade_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

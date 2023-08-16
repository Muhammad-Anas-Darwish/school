@extends('layouts.master')

@section('content')
<form action="{{ url(route('classrooms.update', $classroom->id)) }}" method="post">
    @method('put')
    @csrf

    <input type="text" name="title" value="{{ $classroom->title }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <select name="grade_id">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}" @if ($classroom->grade_id === $grade->id) selected @endif>{{ $grade->title }}</option>
        @endforeach
    </select>
    @error('grade_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

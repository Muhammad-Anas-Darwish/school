@extends('layouts.master')

@section('content')
<form action="{{url(route('exams.store'))}}" method="post">
    @csrf

    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    Semeseter
    <select name="semester_id">
        <option>--------</option>
        @foreach ($semesters as $semester)
            <option value="{{ $semester->id }}" @if (old('semester_id') == $semester->id) selected @endif>{{ $semester->title }}</option>
        @endforeach
    </select>
    @error('semester_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Save">
</form>
@endsection

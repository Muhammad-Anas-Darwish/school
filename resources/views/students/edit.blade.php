@extends('layouts.master')

@section('content')
<form action="{{ url(route('students.update', $student->id)) }}" method="post">
    @method('put')
    @csrf

    first name
    <input type="text" name="first_name" value="{{ $student->first_name }}">
    @error('first_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    last name
    <input type="text" name="last_name" value="{{ $student->last_name }}">
    @error('last_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    father
    <input type="text" name="father_name" value="{{ $student->father_name }}">
    @error('father_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    mother
    <input type="text" name="mother_name" value="{{ $student->mother_name }}">
    @error('mother_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    birth date
    <input type="date" name="birth_date" value="{{ $student->birth_date }}">
    @error('birth_date')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    gender
    <select name="gender">
        <option>--------</option>
        @foreach (config('app.select_gender') as $key => $value)
            <option value="{{ $key }}" @if ($student->birth_date == {{ $key }}) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
    @error('gender')
        <div>- {{ $message }}</div>
    @enderror

    <select name="grade_id">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}" @if ($student->grade_id == $grade->id) selected @endif>{{ $grade->title }}</option>
        @endforeach
    </select>
    @error('grade_id')
        <div>- {{ $message }}</div>
    @enderror

    <select name="classroom_id">
        <option value="">--------</option>
        @foreach ($classrooms as $classroom)
            <option value="{{ $classroom->id }}" @if ($student->classroom_id == $classroom->id) selected @endif>{{ $classroom->title }}</option>
        @endforeach
    </select>
    @error('classroom_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

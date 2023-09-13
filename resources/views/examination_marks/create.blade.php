@extends('layouts.master')

@section('content')
<form action="{{url(route('examination_marks.store'))}}" method="post">
    @csrf

    mark:
    <input type="number" name="mark" value="{{ old('mark') }}">
    @error('mark')
        <div>- {{ $message }}</div>
    @enderror

    <br>
    student:
    <select name="student_id">
        <option>--------</option>
        @foreach ($students as $student)
            <option value="{{ $student->id }}" @if (old('student_id') == $student->id) selected @endif>{{ $student->user->username }}</option>
        @endforeach
    </select>
    @error('student_id')
        <div>- {{ $message }}</div>
    @enderror

    <br>

    subject:
    <select name="subject_id">
        <option>--------</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}" @if (old('subject_id') == $subject->id) selected @endif>{{ $subject->title }}</option>
        @endforeach
    </select>
    @error('subject_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Save">
</form>
@endsection

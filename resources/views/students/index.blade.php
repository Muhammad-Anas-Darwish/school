@extends('layouts.master')

@section('content')

<form>
    first name:
    <input type="text" name="first_name">
    last name:
    <input type="text" name="last_name">
    gender:
    <select name="gender">
        <option value="">--------</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    grade:
    <select name="grade">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->title }}</option>
        @endforeach
    </select>
    <!-- TODO hide classroom with js -->
    classroom:
    <select name="classroom">
        <option value="">--------</option>
        @foreach ($classrooms as $classroom)
            <option value="{{ $classroom->id }}">{{ $classroom->title }}</option>
        @endforeach
    </select>
    <input type="submit" value="Filter">
</form>

@foreach ($students as $student)
    First Name: {{ $student->first_name }} <br>
    Second Name: {{ $student->last_name }} <br>
    Father Name: {{ $student->father_name }} <br>
    Mother Name: {{ $student->mother_name }} <br>
    Birth Date: {{ $student->birth_date }} <br>
    Gender: {{ $student->gender }} <br>
    Username: {{ $student->user->username }} <br>
    Grade: {{ $student->grade->title }} <br>
    Classroom: {{ $student->classroom->title }} <br>
    <form action="{{url(route('students.destroy', $student->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <hr>
@endforeach
@endsection


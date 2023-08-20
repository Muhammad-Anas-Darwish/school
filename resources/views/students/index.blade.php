@extends('layouts.master')

@section('content')
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


@extends('layouts.master')

@section('content')
First Name: {{ $student->first_name }} <br>
Second Name: {{ $student->last_name }} <br>
Father Name: {{ $student->father_name }} <br>
Mother Name: {{ $student->mother_name }} <br>
Birth Date: {{ $student->birth_date }} <br>
Gender: {{ $student->gender }} <br>
Username: {{ $student->user->username }} <br>
Grade: {{ $student->grade->title }} <br>
Classroom: {{ $student->classroom->title }} <br>
@endsection

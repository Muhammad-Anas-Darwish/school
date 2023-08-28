@extends('layouts.master')

@section('content')
@foreach ($marksYear as $markYear)
    mark: {{$markYear->mark}}
    type: {{$markYear->type}}
    student: {{$markYear->student->first_name}} {{$markYear->student->last_name}}
    subject: {{$markYear->subject->title}}
    grade: {{$markYear->grade->title}}
    year: {{$markYear->year->title}}
    semester: {{$markYear->semester->title}}
    <form action="{{url(route('marks_year.destroy', $markYear->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


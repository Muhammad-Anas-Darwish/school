@extends('layouts.master')

@section('content')
@foreach ($exams as $exam)
    - {{$exam->title}}
    semester: {{$exam->semester->title}}
    <form action="{{url(route('exams.destroy', $exam->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


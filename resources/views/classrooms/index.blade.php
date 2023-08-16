@extends('layouts.master')

@section('content')
@foreach ($classrooms as $classroom)
    - {{$classroom->title}}
    grade: {{$classroom->grade->title}}
    <form action="{{url(route('classrooms.destroy', $classroom->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


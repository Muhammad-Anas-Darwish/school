@extends('layouts.master')

@section('content')
@foreach ($semesters as $semester)
    - {{$semester->title}}
    <form action="{{url(route('semesters.destroy', $semester->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


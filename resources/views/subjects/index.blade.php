@extends('layouts.master')

@section('content')
<form method="get">
    title:
    <input type="text" name="title">
    grade:
    <select name="grade">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->title }}</option>
        @endforeach
    </select>
    <input type="submit" value="Filter">
</form>
<br>

@foreach ($subjects as $subject)
    <h3>- {{$subject->title}}</h3>
    <h3>{{$subject->full_mark}}</h3>

    <h3>grade: {{$subject->grade->title}}</h3>
    <form action="{{url(route('subjects.destroy', $subject->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


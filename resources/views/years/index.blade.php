@extends('layouts.master')

@section('content')
@foreach ($years as $year)
    - {{$year->title}}
    <form action="{{url(route('years.destroy', $year->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


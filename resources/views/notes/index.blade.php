@extends('layouts.master')

@section('content')
@foreach ($notes as $note)
    - {{$note->username}} {{$note->first_name}} {{$note->type}}
    <form action="{{url(route('notes.destroy', $note->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


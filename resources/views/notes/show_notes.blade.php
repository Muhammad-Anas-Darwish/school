@extends('layouts.master')

@section('content')
@foreach ($notes as $note)
    - {{ $note->type }} {{ $note->created_at }}
    <br>
@endforeach
@endsection


@extends('layouts.master')

@section('content')
{{ $note->student->first_name }} {{ $note->student->last_name }}
<br>
{{ $note->year->title }}
<br>
{{ $note->type }}
@endsection

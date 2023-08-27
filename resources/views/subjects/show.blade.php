@extends('layouts.master')

@section('content')
{{ $subject->title }}
<br>
{{ $subject->full_mark }}
<br>
{{ $subject->grade->title }}
@endsection

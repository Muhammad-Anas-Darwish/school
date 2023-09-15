@extends('layouts.master')

@section('content')
@foreach ($examinationMarks as $examinationMark)
    {{ $examinationMark->subject->title }} {{ $examinationMark->mark }} {{ $examinationMark->created_at }}
    <br>
@endforeach
@endsection

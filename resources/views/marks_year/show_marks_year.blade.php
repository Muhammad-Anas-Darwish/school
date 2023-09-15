@extends('layouts.master')

@section('content')
@foreach ($marksYear as $markYear)
    {{ $markYear->subject->title }} {{ $markYear->mark }} {{ $markYear->created_at }}
@endforeach
@endsection

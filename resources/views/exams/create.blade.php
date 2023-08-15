@extends('layouts.master')

@section('content')
<form action="{{url(route('exams.store'))}}" method="post">
    @csrf

    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <input type="text" name="semester_id" value="{{ old('semester_id') }}">
    @error('semester_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Save">
</form>
@endsection

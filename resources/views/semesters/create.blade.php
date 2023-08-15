@extends('layouts.master')

@section('content')
<form action="{{url(route('semesters.store'))}}" method="post">
    @csrf

    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Save">
</form>
@endsection

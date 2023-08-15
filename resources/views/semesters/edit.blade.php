@extends('layouts.master')

@section('content')
<form action="{{url(route('semesters.update', $semester->id))}}" method="post">
    @method('put')
    @csrf

    <input type="text" name="title" value="{{$semester->title}}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

@extends('layouts.master')

@section('content')
<form action="{{url(route('grades.update', $grade->id))}}" method="post">
    @method('put')
    @csrf

    <input type="text" name="title" value="{{$grade->title}}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

@extends('layouts.master')

@section('content')
<form action="{{url(route('years.update', $year->id))}}" method="post">
    @method('put')
    @csrf

    <input type="text" name="title" value="{{$year->title}}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

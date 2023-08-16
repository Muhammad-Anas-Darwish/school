@extends('layouts.master')

@section('content')
<form action="{{ url(route('classrooms.store')) }}" method="post">
    @csrf

    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <select name="grade_id">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}" @if (old('grade_id') == $grade->id) selected @endif>{{ $grade->title }}</option>
        @endforeach
    </select>
    @error('grade_id')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Save">
</form>
@endsection

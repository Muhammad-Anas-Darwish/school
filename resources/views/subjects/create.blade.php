@extends('layouts.master')

@section('content')
<form action="{{ url(route('subjects.store')) }}" method="post">
    @csrf

    title:
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div>- {{ $message }}</div>
    @enderror

    <br>

    full mark:
    <input type="number" name="full_mark" value="{{ old('full_mark') }}">
    @error('full_mark')
        <div>- {{ $message }}</div>
    @enderror

    <br>

    grade:
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

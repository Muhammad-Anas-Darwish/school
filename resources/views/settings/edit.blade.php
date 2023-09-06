@extends('layouts.master')

@section('content')
    <form action="{{url(route('settings.update'))}}" method="post">
        @csrf
        @method('patch')

        <select name="semester_id">
            <option>--------</option>
            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}" @if ($currentSemesterId == $semester->id) selected @endif>{{ $semester->title }}</option>
            @endforeach
        </select>
        @error('semester_id')
            <div>- {{ $message }}</div>
        @enderror

        <input type="submit" value="Save">
    </form>
@endsection

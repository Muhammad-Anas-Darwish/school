@extends('layouts.master')

@section('content')
<form action="{{url(route('notes.store'))}}" method="post">
    @csrf

    <select name="student_id">
        <option>--------</option>
        @foreach ($students as $student)
        <option value="{{ $student->id }}" @if (old('student_id') == $student->id) selected @endif>{{ "{$student->first_name} {$student->last_name} {$student->username}" }}</option>
        @endforeach
    </select>
    @error('student_id')
        <div>- {{ $message }}</div>
    @enderror

    <select name="type">
        @foreach (config('app.select_note_type') as $key => $value)
            <option value="{{ $key }}" @if(old('type') == $key) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
    @error('type')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Save">
</form>
@endsection

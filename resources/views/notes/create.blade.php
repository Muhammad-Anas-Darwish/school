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
        <option value="lateness" @if(old('type') == 'lateness') selected @endif>Lateness</option>
        <option value="absence" @if(old('type') == 'absence') selected @endif>Absence</option>
    </select>
    @error('type')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Save">
</form>
@endsection

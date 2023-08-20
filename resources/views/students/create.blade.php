
@extends('layouts.master')

@section('content')

<form action="{{url(route('students.store'))}}" method="post">
    @csrf

    first name
    <input type="text" name="first_name" value="{{ old('first_name') }}">
    @error('first_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    last name
    <input type="text" name="last_name" value="{{ old('last_name') }}">
    @error('last_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    father name
    <input type="text" name="father_name" value="{{ old('father_name') }}">
    @error('father_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    mother name
    <input type="text" name="mother_name" value="{{ old('mother_name') }}">
    @error('mother_name')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    birth date
    <input type="date" name="birth_date" value="{{ old('birth_date') }}">
    @error('birth_date')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    gender
    <select name="gender">
        <option value="male" @if (old('gender') == "male") selected @endif>Male</option>
        <option value="female" @if (old('gender') == "female") selected @endif>Female</option>
    </select>
    @error('gender')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    user
    <select name="user_id">
        <option>--------</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" @if (old('user_id') == $user->id) selected @endif>{{ $user->username }}</option>
        @endforeach
    </select>
    @error('user_id')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    grade
    <select name="grade_id">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}" @if (old('grade_id') == $grade->id) selected @endif>{{ $grade->title }}</option>
        @endforeach
    </select>
    @error('grade_id')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    classroom
    <select name="classroom_id">
        <option value="">--------</option>
        @foreach ($classrooms as $classroom)
            <option grade="{{ $classroom->grade->id }}" value="{{ $classroom->id }}" @if (old('classroom_id') == $classroom->id) selected @endif>{{ $classroom->title }}</option>
        @endforeach
    </select>
    @error('classroom_id')
        <div>- {{ $message }}</div>
    @enderror
    <br>

    <input type="submit" value="Save">
</form>

<script src="{{url('js', 'change_choices.js')}}"></script>

<script>
    changeChoices('grade_id', 'classroom_id', 'grade');
</script>
@endsection

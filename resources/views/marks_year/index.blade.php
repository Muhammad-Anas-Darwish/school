@extends('layouts.master')

@section('content')

<form>
    mark:
    <input type="number" name="mark" max="10">
    type:
    <select name="type">
        <option value="">--------</option>
        <option value="homeworks">Homeworks</option>
        <option value="recite">Recite</option>
        <option value="participation">Participation</option>
        <option value="discipline">Discipline</option>
    </select>
    grade:
    <select name="grade">
        <option value="">--------</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->title }}</option>
        @endforeach
    </select>
    year:
    <select name="year">
        <option value="">--------</option>
        @foreach ($years as $year)
            <option value="{{ $year->id }}">{{ $year->title }}</option>
        @endforeach
    </select>
    semester:
    <select name="semester">
        <option value="">--------</option>
        @foreach ($semesters as $semester)
            <option value="{{ $semester->id }}">{{ $semester->title }}</option>
        @endforeach
    </select>
    <input type="submit" value="Filter">
</form>

@foreach ($marksYear as $markYear)
    mark: {{$markYear->mark}}
    type: {{$markYear->type}}
    student: {{$markYear->student->first_name}} {{$markYear->student->last_name}}
    subject: {{$markYear->subject->title}}
    grade: {{$markYear->grade->title}}
    year: {{$markYear->year->title}}
    semester: {{$markYear->semester->title}}
    <form action="{{url(route('marks_year.destroy', $markYear->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach
@endsection


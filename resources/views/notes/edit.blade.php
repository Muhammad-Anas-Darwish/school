@extends('layouts.master')

@section('content')
<form action="{{ url(route('notes.update', $note->id)) }}" method="post">
    @method('patch')
    @csrf

    <select name="type">
        <option value="lateness" @if($note->type == 'lateness') selected @endif>Lateness</option>
        <option value="absence" @if($note->type == 'absence') selected @endif>Absence</option>
    </select>
    @error('type')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

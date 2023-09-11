@extends('layouts.master')

@section('content')
<form action="{{ url(route('notes.update', $note->id)) }}" method="post">
    @method('patch')
    @csrf

    <select name="type">
    @foreach (config('app.select_note_type') as $key => $value)
            <option value="{{ $key }}" @if($note->type == $key) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
    @error('type')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

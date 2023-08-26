@extends('layouts.master')

@section('content')
<h4>{{ $user->username }}</h4>
<form action="{{ url(route('users.update', $user->username)) }}" method="post">
    @method('put')
    @csrf

    <input type="password" name="password">
    @error('password')
        <div>- {{ $message }}</div>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection

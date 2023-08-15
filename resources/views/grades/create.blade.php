<form action="{{url(route('grades.store'))}}" method="post">
    @csrf
    <input type="text" name="title" value="{{old('title')}}">
    <input type="submit" value="Save">
</form>

@if($errors)
    {{$errors}}
@endif

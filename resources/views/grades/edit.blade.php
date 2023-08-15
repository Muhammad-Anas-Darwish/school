<form action="{{url(route('grades.update', $grade->id))}}" method="post">
    @method('put')
    @csrf
    <input type="text" name="title">
    <input type="submit" value="Update">
</form>

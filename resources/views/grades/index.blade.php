@foreach ($grades as $grade)
    - {{$grade->title}}
    <form action="{{url(route('grades.destroy', $grade->id))}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    <br>
@endforeach

{{session('success')}}

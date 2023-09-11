<form action="{{url(route('login'))}}" method="POST" >
    @csrf
    <input type="text" name="username" >
    <input type="password" name="password">
    <input type="submit" value="Login">
</form>

@if($errors->has('login_failed'))
    <div class="alert alert-danger">{{ trans($errors->first('login_failed')) }}</div>
@endif

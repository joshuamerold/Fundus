@include('standards.header')

@foreach($users as $user)
  id = {{$user->id}}
  name = {{$user->name}} <br>
@endforeach

@include('standards.header')
